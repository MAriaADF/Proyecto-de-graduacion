<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table="person";

    protected $fillable = [
    'name', 'last_name_1', 'last_name_2', 'phone', 'email', 'state',
    ];

      public function data() 
    {
        return $this->hasOne('App\Reservation', 'id_person');
    }
}
