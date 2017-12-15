<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table="reservations";

    protected $fillable = [
    'reservation_num', 'date_reservation', 'date_check_in', 'date_check_out', 'observation', 'state', 'id_person', 'id_inc_exp', 
    ];

   
     public static function towns($date_check_in, $date_check_out, $pax){
     	return DB::select("call hab_disponible('$date_check_in','$date_check_out',$pax)"); 
        
    }

  /*  public static function person($tipo, $date_start, $date_end){
     	return DB::select("call report_reservations($tipo,'$date_start', '$date_end')");  
        
    }*/
    
}