<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryPriceRoom extends Model
{
    protected $table="history_price_room";

    protected $fillable = [
    'date', 'price', 'action_type', 'id_user', 'id_price_room',
    ];
    
}