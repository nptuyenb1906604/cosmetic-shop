<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    protected $fillable = ['name_tp', 'type'];

    protected $primaryKey = 'matp';
    protected $table = 'tbl_tinhthanhpho';
}
