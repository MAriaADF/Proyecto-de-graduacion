<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryReservation extends Model
{
    protected $table="history_reservation";

    protected $fillable = [
    'date', 'action_type', 'id_user', 'id_reservation',
    ];
    
}