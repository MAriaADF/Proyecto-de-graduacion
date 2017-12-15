<?php

namespace App\Http\Controllers;

use Validator;
use App\Person;
use App\Reservation;
use App\Http\Requests;
use App\RoomReservation;
use App\IncomeExpenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\mail;
use App\Http\Controllers\Controller;


class ReservationController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }
   
     public function index(){

        try{
              DB::beginTransaction();
                
        $reservation = DB::select("call rervas_dia()");
        $result = DB::select("call notification_reservation");
        
        return view('reservation/day_reservations')->with('reservation', $reservation)->with('result', $result);

           }
            catch(\Exception $e){
              return redirect('/home')-> with('error', 'Ocurrio un error al realizar la consulta');
                DB::rollback();
            }
    }

    public function indexRoom(Request $request, $date_check_in, $date_check_out, $pax){
       
         if($request->ajax()){
            $reservation = Reservation::towns($date_check_in, $date_check_out, $pax);
            return response()->json($reservation);
        }
    }

    /**
     * Muestra todas las reservas 
     * @return  retorna la vista de buscar reserva 
     */
    public function indexSearch(){
        try{
                $person = Person::where('state','!=','0' )->get();
                $reservation = DB::select("call rervas_search()");
                $result = DB::select("call notification_reservation");

              return view('reservation/search')->with('reservation', $reservation)->with('result', $result)->with('person', $person);
                

           }
            catch(\Exception $e){
               return redirect('/home')-> with('error', 'Ocurrio un error al realizar la consulta');
                DB::rollback();
            }
    }


    /**
     * Segun los el id de la persona y la reserva muestra los datos
     * en la vista para luego editar la reserva  la habitación 
     * ya sea elimar uno o agregar
     * @param  int  $id_person, int $id_reservation
     * @return  retorna la vista de editar reserva
     */
    public function see($id_person, $id_reservation)
    {
      $num="2";
      return $this->data($num,$id_person, $id_reservation);
       
    }
    /**
     * Segun los el id de la persona y la reserva muestra los datos
     * en la vista para luego editar la reserva  la habitación 
     * ya sea elimar uno o agregar
     * @param  int  $id_person, int $id_reservation
     * @return  retorna la vista de editar reserva
     */
    public function history($id_person, $id_reservation)
    {
        try {
            
        $idan='';
        $result = DB::select("call notification_reservation");
        $his = DB::select("call history_reservation($id_reservation)");
        foreach($his as $value) {
            $idan = $value->reservation_num;
        }
        return view('reservation/history')->with('his', $his)->with('result', $result)->with('idan', $idan);

        }catch(\Exception $e){
            return redirect('/home')-> with('error', 'Ocurrio un error al realizar la consulta');
        }

    }
    /**
     * Segun los el id de la persona y la reserva muestra los datos
     * en la vista para luego editar la reserva  la habitación 
     * ya sea elimar uno o agregar
     * @param  int  $id_person, int $id_reservation
     * @return  retorna la vista de editar reserva
     */
    public function edit($id_person, $id_reservation)
    {
      $num="1";
      return $this->data($num,$id_person, $id_reservation);
       
    }

    /**
     * Guarda una nueva reserva a la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request){
        $payment= $request->get('payment');
        if($payment=="payment"){
            $num="2";
        }else{
           $num="1"; 
        }
        
        return $this->dataStore($request, $num);
        
    }
    
      public function create()
    {
         try{
            $result = DB::select("call notification_reservation");
            $person = Person::where('state','!=','0' )->get();
            return view('reservation/create', compact('person'))->with('result', $result);

           }
            catch(\Exception $e){
                return redirect('/home')-> with('error', 'Ocurrio un error al realizar la consulta');
                DB::rollback();
            }
    }

    public function data($num, $id_person, $id_reservation)
    {
        try{
              DB::beginTransaction();
                $person = Person::findOrFail($id_person);
                $reservation = Reservation::findOrFail($id_reservation);
                $room = DB::select("CALL room_reservation($id_reservation)");
                $result = DB::select("call notification_reservation");
 
                    if($num=="1"){
                    return view('reservation/edit')->with('room', $room)->with('person', $person)->with('reservation', $reservation)->with('result', $result);
                  }else{
                    return view('reservation/see')->with('room', $room)->with('person', $person)->with('reservation', $reservation)->with('result', $result);
                }

           }
            catch(\Exception $e){
                return redirect('/home')-> with('error', 'Ocurrio un error al realizar la consulta');
                DB::rollback();
            }
    }

    public function show( $id)
    {
        try{
                $person = Person::findOrFail($id);
                $result = DB::select("call notification_reservation");
                return view('reservation/create', compact('person','id'))->with('result', $result);

           }
            catch(\Exception $e){
                 return redirect('/home')-> with('error', 'Ocurrio un error al realizar la consulta');
                DB::rollback();
            }
    }

    public function consult(Request $request)
    { 
        try{
             $name=$request->get('name');
            if($name==""){
                 print_r("falat el nombre");
            }else{

                 $reserver=$request->get('reserver');
                $id=$request->get('id');
                $date_start=$request->get('date_start');
                $date_end=$request->get('date_end');
                $reservation_num=$request->get('reservation_num');
                

                   if($reserver==0){
                        $person = Person::join('reservations', 'person.id', '=', 'reservations.id_person')->select('person.*')->get();
                        $reservation = DB::select("call search_client_reserv($id, '$date_start', '$date_end')");
                        $result = DB::select("call notification_reservation");

                             return view('reservation/search')->with('reservation', $reservation)->with('result', $result)->with('person', $person);
                    }elseif ($reserver==1) {

                        $person = Person::join('reservations', 'person.id', '=', 'reservations.id_person')->select('person.*')->get();
                        $reservation = DB::select("call search_num_reserv( '$reservation_num')");
                        $result = DB::select("call notification_reservation");

                             return view('reservation/search')->with('reservation', $reservation)->with('result', $result)->with('person', $person);
                    }elseif ($reserver==2) {

                        $person = Person::join('reservations', 'person.id', '=', 'reservations.id_person')->select('person.*')->get();
                        $reservation = DB::select("call search_date_reserv('$date_start', '$date_end')");
                        $result = DB::select("call notification_reservation");

                             return view('reservation/search')->with('reservation', $reservation)->with('result', $result)->with('person', $person);
                    }
            }
            
        
      }
            catch(\Exception $e){
               return redirect('reservation/search')-> with('error', 'Ocurrio un error a realizar la consulta');
            }
    }

     public function dataStore($request, $num)
    {
        $state='1';
        $action_type ='Reservación';
        $observation=$request->get('observation');
        $pax2=$request->get('pax_a');
        $date_check_in=$request->get('value_from_start_date');
        $date_check_out=$request->get('value_from_end_date');
        $email=$request->get('email');
        $id_person="0";
        $action_type='Reservación';

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
                    'name'=>$request->get('name'),
                    'last_name_1'=>$request->get('last_name_1'),
                    'last_name_2'=>$request->get('last_name_2'),
                    'phone'=>$request->get('phone'),
                    'email'=>$request->get('email'),
                    'state'=>'2',
                ]);
                }

                $Result = DB::select("call insert_reservation('$date_check_in', '$date_check_out', '$observation', $state, $id_person)");

                foreach($Result as $value) {
                    $id_reservation = $value->id_reservation;
                    $reservation_num = $value->num;
                }

                $result = DB::select("call notification_reservation");

                $room_reservations = DB::table('room_reservations')->insert(
                [
                    'pax_num'=>$request->get('pax'),
                    'price'=>$request->get('total'),
                    'id_room'=>$request->get('room'),
                    'id_reservation' => $id_reservation,
                ]);

                if (!$pax2=="") {
                    DB::table('room_reservations')->insert(
                    [
                        'pax_num'=>$request->get('pax_a'),
                        'price'=>$request->get('total_a'),
                        'id_room'=>$request->get('room_a'),
                        'id_reservation' => $id_reservation,
                    ]);
        

                }

                if($num=="2"){
                     $inc_ex =  IncomeExpenses::create([
                        'concept'=>"Reservación",
                        'bill_num'=>$reservation_num,
                        'sum'=>$request->get('suma'),
                        'state'=>"1",
                        'invoce_date'=>date('Y-m-d'),
                     ]);

                     $hist = DB::table('history_inc_exp')->insert(
                        [
                          'sum'=>$request->get('suma'),
                          'action_type'=>$action_type,
                          'id_user' => Auth::user()->id,
                          'id_inc_exp'=> $inc_ex->id,
                        ]);
                     $rese = Reservation::find($id_reservation);
                    $rese->id_inc_exp= $inc_ex->id;
                    $rese->save();
                }

               $his =DB::table('history_reservations')->insert(
                [
                'action_type'=>$action_type,
                'id_user'=> Auth::user()->id,
                'id_reservation' => $id_reservation,
                ]);
                 $person = Person::where('state','!=',"0" )->get();
               return redirect('/home')-> with('status', 'Ingreso de Reserva satisfactorio');

    }

     public function pago( Request $request)
    {
        try{
        $id_reservation = $request->get('id_reser');

                $inc_ex =  IncomeExpenses::create([
                        'concept'=>"Reservación",
                        'bill_num'=>$request->get('reservation_num'),
                        'sum'=>$request->get('sum'),
                        'state'=>"1",
                        'invoce_date'=>date('Y-m-d'),
                     ]);

                    $rese = Reservation::find($id_reservation);
                    $rese->id_inc_exp= $inc_ex->id;
                    $rese->save();

                     $hist = DB::table('history_inc_exp')->insert(
                        [
                          'sum'=>$request->get('sum'),
                          'action_type'=>"Reservación",
                          'id_user' => Auth::user()->id,
                          'id_inc_exp'=> $inc_ex->id,
                        ]);
                     
                

               $his =DB::table('history_reservations')->insert(
                [
                'action_type'=>"Reservación",
                'id_user'=> Auth::user()->id,
                'id_reservation' => $id_reservation,
                ]);

                $person = Person::where('state','!=','0' )->get();
                $reservation = DB::select("call rervas_search()");
                $result = DB::select("call notification_reservation");

                return view('reservation/search')->with('reservation', $reservation)->with('result', $result)->with('person', $person);
                
           }
            catch(\Exception $e){
                 return redirect('/home')-> with('error', 'Ocurrio un error al realizar la consulta');
                DB::rollback();
            }
    }

     public function date_check_in( $id_reservation)
    {
        try{

                $rese = Reservation::find($id_reservation);
                $rese->state= "4";
                $rese->save();

               $his =DB::table('history_reservations')->insert(
                [
                'action_type'=>"Check in",
                'id_user'=> Auth::user()->id,
                'id_reservation' => $id_reservation,
                ]);
               $reservation = DB::select("call rervas_dia()");
                $result = DB::select("call notification_reservation");
                 return view('reservation/day_reservations')->with('reservation', $reservation)->with('result', $result);
                
           }
            catch(\Exception $e){
                 return redirect('/home')-> with('error', 'Ocurrio un error al realizar la consulta');
                DB::rollback();
            }
    }

     public function date_check_out( $id_reservation)
    {
        try{
                $rese = Reservation::find($id_reservation);
                $rese->state="3" ;
                $rese->save();

               $his =DB::table('history_reservations')->insert(
                [
                'action_type'=>"Check out",
                'id_user'=> Auth::user()->id,
                'id_reservation' => $id_reservation,
                ]);
               $reservation = DB::select("call rervas_search()");
               $result = DB::select("call notification_reservation");
               $person = Person::where('state','!=','0' )->get();
                return view('reservation/search')->with('reservation', $reservation)->with('result', $result)->with('person', $person);
                
           }
            catch(\Exception $e){
                 return redirect('/home')-> with('error', 'Ocurrio un error al realizar la consulta');
                DB::rollback();
            }
    }
}
