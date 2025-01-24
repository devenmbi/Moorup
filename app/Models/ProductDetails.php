<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;

    protected $table = 'product_details';
    public $timestamps = false;

    protected $fillable = [
        'style_code',
        'slug',
        'look_name',
        'product_name',
        'category_id',
        'fabric_composition_id',
        'product_fabric_id',
        'product_price',
        'description',
        'thumbnail_image',
        'gallery_images',
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
