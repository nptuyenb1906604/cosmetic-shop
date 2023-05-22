<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;
    protected $fillable = ['shipping_name', 'matp', 'maqh', 'xaid', 'shipping_address', 'shipping_email', 'shipping_phone', 'shipping_note', 'shipping_payment'];

    protected $primaryKey = 'shipping_id';
    protected $table = 'tbl_shipping'; 

    public function city(){
    	return $this->belongsTo('App\City', 'matp'); //1:1
    }
    public function province(){
    	return $this->belongsTo('App\Province', 'maqh'); //1:1
    }
    public function ward(){
    	return $this->belongsTo('App\Ward', 'xaid'); //1:1
    }
}
