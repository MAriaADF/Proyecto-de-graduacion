<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryProvision extends Model
{
    protected $table="history_provisions";

    protected $fillable = [
    'quantity', 'date','type', 'action_type', 'id_provision', 'id_user', 
    ];
    
}