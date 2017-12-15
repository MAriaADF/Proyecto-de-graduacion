<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Person;
use App\Reservation;

class PeopleController extends Controller
{
     public function store(Request $request)
    {
/*
      $persona =  Person::create([
            'name'=>$request->get('name'),
            'last_name_1'=>$request->get('last_name_1'),
            'last_name_2'=>$request->get('last_name_2'),
            'phone'=>$request->get('phone'),
            'email'=>$request->get('email')
        ]);

      DB::table('reservations')->insert(
        [
            'reservation_num'=>$request->get('reservation_num'),
            'date_reservation'=>$request->get('date_reservation'),
            'date_check_in'=>$request->get('date_check_in'),
            'date_check_out'=>$request->get('date_check_out'),
            'observation'=>$request->get('observation'),
            'id_person' => $persona->id,
            ]);
        return response()->json(['mensaje'=>'La reserva se ha insertado','codigo'=>'201'],201);
    }*/
}
