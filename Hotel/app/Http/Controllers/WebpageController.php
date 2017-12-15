<?php

namespace App\Http\Controllers;

use Validator;
use App\Person;
use App\Reservation;
use App\RoomReservation;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\mail;
use App\Http\Controllers\Controller;


class WebpageController extends Controller
{
    //
    public function index(){
    	return view('webpage/index');
    }

    public function galeria(){
    	return view ('webpage/galeria');
    }

    public function nuestrohotel(){
    	return view ('webpage/nuestrohotel');
    }

    public function conctactenos(){
    	return view ('webpage/conctactenos');
    }

    public function create(){
        return view('webpage/reserva');
    }

    public function store(Request $request){
        $state='0';
        $obsevation=NULL;
        $pax= $request->get('pax');
        $pax2= $request->get('pax2');
        $date_check_in=$request->get('value_from_start_date');
        $date_check_out=$request->get('value_from_end_date');
        $email=$request->get('email');

        $rules=array(
            'email'=>'required|unique:person', 
            );

                $validator=Validator::make($request->all(),$rules);
                
                if ($validator->fails())
                {
                      $res = DB::select("call person('$email')");
                      foreach($res as $value) {
                            $id_person = $value->id;
                        }
                }else{
                     $id_person = DB::table('person')->insertGetId(
                [   
                    'name'=>$request->get('lastname'),
                    'last_name_1'=>$request->get('last_name_1'),
                    'last_name_2'=>$request->get('last_name_2'),
                    'phone'=>$request->get('phone'),
                    'email'=>$request->get('email'),
                ]);
                }

        try{
           DB::beginTransaction();

              

                $Result = DB::select("call insert_reservation('$date_check_in', '$date_check_out', ' $obsevation', $state, $id_person)");

                foreach($Result as $value) {
                    $id_reservation = $value->id_reservation;
                }
                 $room_reservations = DB::table('room_reservations')->insert(
                [

                    'pax_num'=>$request->get('pax'),
                    'price'=>$request->get('total'),
                    'id_reservation' => $id_reservation,
                ]);

                if (!$pax2=="") {
                    DB::table('room_reservations')->insert(
                    [
                        'pax_num'=>$request->get('pax2'),
                        'price'=>$request->get('total2'),
                        'id_reservation' => $id_reservation,
                    ]);
                }

                 $his =DB::table('history_reservations')->insert(
                [
                'action_type'=>'Reservación en linea',
               // 'id_user'=> Auth::user()->id,
                'id_reservation' => $id_reservation,
                ]);

                

              if( !$id_person || !$room_reservations){
                  DB::rollback();
                } else {
                    DB::commit(); 
                    return view('webpage/reserva');
                }

           }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
    }
   
    public function edit($id_person, $id_reservation)
    {
        $pax ='1';
                $person = Person::findOrFail($id_person);
                $reservation = Reservation::findOrFail($id_reservation);
                $result = DB::select("call notification_reservation");
                $room = DB::select("call room($id_reservation)");
                 foreach($room as $value) {
                    $pax = $value->nfila;
                }
                    return view('reservation/editOnline')->with('room', $room)->with('person', $person)->with('reservation', $reservation)->with('result', $result)->with('pax', $pax);

    }
    public function update(Request $request, $id_reservation, $id_person)
    {
        $cancelar= $request->get('cancelar');
        if($cancelar=="cancelar"){
            $num="2";
        }else{
           $num="1"; 
        }
        return $this->updateReservation($request, $id_reservation, $id_person, $num);   
    }
    public function updateReservation($request, $id_reservation, $id_person,$num){
        if($num=="2"){
            $action_type ='Cancelada';
        $name=$request->get('name');
        $last_name_1=$request->get('last_name_1');
        $email=$request->get('email');
        $reservation_num=$request->get('reservation_num');
        $state='2';
        $data = array(
        'name' =>($name . " " .$last_name_1) ,
        'num' => $reservation_num,
     );
    
            $rese = Reservation::find($id_reservation);
            $rese->state= $state;
            $rese->save();

            $his =DB::table('history_reservations')->insert(
                [
                'action_type'=>$action_type,
                'id_user'=> Auth::user()->id,
                'id_reservation' => $id_reservation,
                ]);

    Mail::send('emails.cancelation', $data, function ($message) use ($email)  {

        $message->from('hotelsuenodeluna@gmail.com', 'Cancelación de reserva');

        $message->to($email)->subject('Hotel Sueño de Luna');

    return redirect('/home')-> with('status', 'Reserva cancelada satisfactoriamente');

     });
        }else{
            $action_type ='Confimación';
        $canti=$request->get('canti');
        $room1=$request->get('room1');
        $id1=$request->get('id1');

        //cris
        $name=$request->get('name');
        $last_name_1=$request->get('last_name_1');
        $email=$request->get('email');
        $tota1=$request->get('total1');
        $reservation_num=$request->get('reservation_num');
        $date_start=$request->get('value_from_start_date');
        $date_end=$request->get('value_from_end_date');
      $data = array(
        'name' =>($name . " " .$last_name_1) ,
        'rooms'=> $canti,
        'total'=>$tota1,
        'date_in'=> $date_start,
        'date_out'=>$date_end,
        'num' => $reservation_num,
    );

   

        $state='1';
    if($canti=="1"){
        if(!$room1==""){
            
            $room = RoomReservation::find($id1);
            $room->id_room= $request->get('room1');
            $room->save();

            $rese = Reservation::find($id_reservation);
            $rese->state= $state;
            $rese->save();

            $his =DB::table('history_reservations')->insert(
                [
                'action_type'=>$action_type,
                'id_user'=> Auth::user()->id,
                'id_reservation' => $id_reservation,
                ]);

           Mail::send('emails.confirmation', $data, function ($message) use ($email)  {

        $message->from('hotelsuenodeluna@gmail.com', 'Confirmación reserva');

        $message->to($email)->subject('Hotel Sueño de Luna');

     });

    return redirect('/home')-> with('status', 'Su reserva  ha sido confirmada.');

 
        }else{
              return redirect('/home')-> with('error', 'Habitacion no asignada');
        }

     }else {
         $room2=$request->get("room2");

        if($room2=="" || $room1==""){
              return redirect('/home')-> with('error', 'Habitacion no asignada');
        }else{

            if($room2===$room1){
                 print_r("las no puede assignar las mismas habitaciones");
            }else{
                $total2=$request->get('total2');
                $sum= $tota1 + ($total2);
            $id2=$request->get('id2');
            $room = RoomReservation::find($id1);
            $room->id_room= $request->get('room1');
            $room->save();

            $room = RoomReservation::find($id2);
            $room->id_room= $request->get('room2');
            $room->save();

            $rese = Reservation::find($id_reservation);
            $rese->state= $state;
            $rese->save();

            $his =DB::table('history_reservations')->insert(
                [
                'action_type'=>$action_type,
                'id_user'=> Auth::user()->id,
                'id_reservation' => $id_reservation,
                ]);

            $result = DB::select("call notification_reservation");
             return view('home')->with('result', $result);
            } 
        }
     }
      
    }
}
}

