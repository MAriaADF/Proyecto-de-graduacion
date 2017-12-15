<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Person;
use App\Reservation;
// Indicamos que trabajamos con Vistas
use View;

// Validación de formularios.
use Validator;

// Redireccionamientos.
use Redirect;

class PersonReservationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('create');
    }
    
     public function store(Request $request)
     {
        $rules=array(
            'email'=>'required|unique:person', 
            'phone'=>'required|unique:person', 
            );

        $validator=Validator::make($request->all(),$rules);
        
        if ($validator->fails())
        {
            return response()->json(['mensaje'=>'error','codigo'=>'201'],201);
        }
      $persona =  Person::create([
            'name'=>$request->get('name'),
            'last_name_1'=>$request->get('last_name_1'),
            'last_name_2'=>$request->get('last_name_2'),
            'phone'=>$request->get('phone'),
            'email'=>$request->get('email'),
        ]);

     $reservation = DB::table('reservations')->insertGetId(
        [
            'reservation_num'=>$request->get('reservation_num'),
            'date_reservation'=>$request->get('date_reservation'),
            'date_check_in'=>$request->get('date_check_in'),
            'date_check_out'=>$request->get('date_check_out'),
            'observation'=>$request->get('observation'),
            'state'=>$request->get('state'),
            'id_person' => $persona->id,
            ]);

     DB::table('history_reservation')->insert(
        [
            'action_type'=>$request->get('action_type')
            'id_reservation' => $reservation,
            'id_user'=> Auth::user()->id
            ]);
    
     DB::table('room_reservations')->insert(
        [
            'pax_num'=>$request->get('pax_num'),
            'price'=>$request->get('price'),
            'id_room'=>$request->get('id_room'),
            'id_reservation' => $reservation,
            ]);
     $result = DB::select("call notification_reservation");
        return response()->json(['mensaje'=>'La reserva se ha insertado','codigo'=>'201'],201);
    }
}
