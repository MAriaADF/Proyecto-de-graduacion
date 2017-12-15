<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryIncExp extends Model
{
    protected $table="history_inc_exp";

    protected $fillable = [
    'date', 'action_type', 'id_user', 'id_inc_exp',
    ];
    
}