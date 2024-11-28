<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProduct extends Model
{
    protected $table='customer_product';
    protected $primaryKey='id';
    protected $fillable=['productname','product_id','discription','price','quantity','photo'];
    use HasFactory;
    public function product(){
        return $this->belongsTo(product::class,'product_id');
    }

}
