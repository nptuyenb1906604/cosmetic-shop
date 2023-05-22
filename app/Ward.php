<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public $timestamps = false;
    protected $fillable = ['name_xp', 'type', 'maqh'];

    protected $primaryKey = 'xaid';
    protected $table = 'tbl_xaphuongthitran';
}
