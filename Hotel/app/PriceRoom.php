<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PriceRoom extends Model
{
    protected $table="price_room";

    protected $fillable = ['pax_num', 'price', 
    ];
    
    public static function pricee($pax){
     	return DB::select("call price_room($pax)"); 
    }
}