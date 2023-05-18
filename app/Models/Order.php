<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = ['user_id','full_name','address','email','phone','price_shipping','status','payment_id'];

    public function orders()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function products() {
        return $this->belongsToMany(Product::class,'order_details','order_id', 'product_id');
    }

    public function getTotalAmount() {
        $t = 0;
        foreach ($this->orders as $dt ) {
            $t += $dt->amount ;
        }
        $t += $this->price_shipping;
        return $t;
    }
    public function getTotalQtt() {
        $t = 0;
        foreach ($this->orders as $dt ) {
            $t += $dt->quantity;
        }
        return $t;
    }

    public function scopeSearch($query) {
        if(request('sort_by')) {
            $sort_by = request('sort_by');
            $arr = explode('-', $sort_by);
            $query = $query->orderBy($arr[0],$arr[1]);
        }
        if(request('show')) {
            $show = request('show');
            $query = $query->limit($show);
        }
        if(request('search')) {
            $search = request('search');
            $query = $query->where('id','like','%'.$search.'%');
        }
        if(request('search1')) {
            $search1 = request('search1');
            $query = $query->where('full_name','like','%'.$search1.'%');
        }
    }
}
