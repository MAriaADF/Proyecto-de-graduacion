<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provision extends Model
{
    protected $table="provisions";

    protected $fillable = [
    'detail', 'quantity', 'state',
    ];
    
}