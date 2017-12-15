<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryHabitation extends Model
{
    protected $table="history_habitations";

    protected $fillable = [
    'observation',  'date', 'action_type', 'id_user', 'id_room', 
    ];
    
}