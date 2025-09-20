<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_size_stock extends Model
{
    use HasFactory;

    protected $fillable=['product_id', 'size_id', 'stock_quantity'];

    public function products(){
        return $this->belongsTo(product::class,'product_id');
    }
    public function sizes(){
        return $this->belongsTo(size::class,'size_id');
    }
}
