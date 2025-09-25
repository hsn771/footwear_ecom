<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'category_id', 'image_url','vendor_id'];

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function vendors(){
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
