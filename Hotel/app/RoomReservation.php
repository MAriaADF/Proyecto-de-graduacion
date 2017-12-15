<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    protected $table="room_reservations";

    protected $fillable = [
    'pax_num', 'price', 'id_room', 'id_reservation',
    ];
    
}