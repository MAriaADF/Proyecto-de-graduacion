<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeExpenses extends Model
{
    protected $table="income_expenses";
    
    protected $fillable = [
    'concept', 'bill_num', 'sum', 'state', 'invoce_date', 
    ];
}