<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   	public $timestamps = false;
    protected $fillable = ['category_id', 'brand_id', 'product_name', 'product_price', 'product_description', 'product_content', 'product_image', 'product_status'];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
}
