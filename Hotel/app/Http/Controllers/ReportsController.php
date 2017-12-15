<?php

namespace App\Http\Controllers;

use App\Room;
use App\Person;
use App\Reservation;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function ReportReservation()
    {       
    $tipo="0";
    $date_start='0000-10-10';
    $date_end="000-12-12";
    $style="display: none";
    $reservation = DB::select("call report_reservations($tipo,'$date_start', '$date_end')");   
    $result = DB::select("call notification_reservation");
      return view('reports/reservation')->with('result', $result)->with('reservation', $reservation)->with('tipo', $tipo)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);
    }

    public function report_reser_tip(Request $request)
    {

        $tip=$request->get('tipo');
        $date_start=$request->get('date_start');
        $date_end=$request->get('date_end');
        $style="";
        $reservation = DB::select("call report_reservations($tip,'$date_start', '$date_end')");   
        $result = DB::select("call notification_reservation");
     
        if($tip=="0"){
             $tipo="Pendientes";
        }elseif ($tip=="1") {
             $tipo="Confirmadas";
        }elseif ($tip=="2") {
             $tipo="Canceladas";
        }else {
             $tipo="Finalizadas";
        }

          return view('reports/reservation')->with('result', $result)->with('reservation', $reservation)->with('tipo', $tipo)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);

    }

    public function ReportClient()
    { 
         $name="";
        $id="0";
         $tipo="0";
        $date_start='0000-10-10';
        $date_end="000-12-12";
        $style="display: none";
        $client = DB::select("call report_client($tipo,'$date_start', '$date_end', $id)");      
        $result = DB::select("call notification_reservation");
        $person = Person::join('reservations', 'person.id', '=', 'reservations.id_person')->select('person.*')->get();

            return view('reports/client')->with('result', $result)->with('client', $client)->with('person', $person)->with('tipo', $tipo)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style)->with('name', $name);      
    }

        public function report_client_tip(Request $request)
    {
        $name=$request->get('name');
        if($name==""){
             print_r("falat el nombre");
        }else{
        $id=$request->get('id');
        $tip=$request->get('tipo');
        $date_start=$request->get('date_start');
        $date_end=$request->get('date_end');
        $style="";
        $client = DB::select("call report_client($tip,'$date_start', '$date_end', $id)");   
        $result = DB::select("call notification_reservation");
        $person = Person::join('reservations', 'person.id', '=', 'reservations.id_person')->select('person.*')->get();

     
        if($tip=="0"){
             $tipo="Pendientes";
        }elseif ($tip=="1") {
             $tipo="Confirmadas";
        }elseif ($tip=="2") {
             $tipo="Canceladas";
        }else {
             $tipo="Finalizadas";
        }

          return view('reports/client')->with('result', $result)->with('client', $client)->with('person', $person)->with('tipo', $tipo)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style)->with('name', $name);
      }
    }

    public function ReportRoom()
    {
        $id_room="0";
        $date_start='0000-10-10';
        $date_end="000-12-12";
        $style="display: none";
        $rooms = DB::select("call report_rooms($id_room,'$date_start', '$date_end')");   
        $room = Room::all();
        $result = DB::select("call notification_reservation");
        return view('reports/rooms', compact('room'))->with('result', $result)->with('rooms', $rooms)->with('id_room', $id_room)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);         
    }

    public function reportRoomTip(Request $request)
    {

        $id_room=$request->get('room');
        $date_start=$request->get('date_start');
        $date_end=$request->get('date_end');
        $style="";
        $rooms = DB::select("call report_rooms($id_room,'$date_start', '$date_end')");  
        foreach($rooms as $value) {
            $id_room = $value->number;
        } 
        $room = Room::all();
        $result = DB::select("call notification_reservation");
        return view('reports/rooms', compact('room'))->with('result', $result)->with('rooms', $rooms)->with('id_room', $id_room)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);         
    }

     public function ReporMaintenance()
    {       
        $action_type='Mantenimiento';
        $date_start='0000-10-10';
        $date_end="000-12-12";
        $style="display: none";
        $rooms = DB::select("call report_clean('$date_start', '$date_end','$action_type')");   
        $result = DB::select("call notification_reservation");
        return view('reports/maintenance')->with('result', $result)->with('rooms', $rooms)->with('action_type', $action_type)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);              
    }
     public function reporMaintenanceTip(Request $request)
    {       
        $action_type='Mantenimiento';
        $date_start=$request->get('date_start');
        $date_end=$request->get('date_end');
        $style="";
        $rooms = DB::select("call report_clean('$date_start', '$date_end','$action_type')");   
        $result = DB::select("call notification_reservation");
        return view('reports/maintenance')->with('result', $result)->with('rooms', $rooms)->with('action_type', $action_type)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);              
    }
     public function ReporCleaning()
    {       
         $action_type='Limpieza';
        $date_start='0000-10-10';
        $date_end="000-12-12";
        $style="display: none";
        $rooms = DB::select("call report_clean('$date_start', '$date_end','$action_type')");   
        $result = DB::select("call notification_reservation");
        return view('reports/cleaning')->with('result', $result)->with('rooms', $rooms)->with('action_type', $action_type)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);       
    }

    public function reporCleaningTip(Request $request)
    {       
        $action_type='Limpieza';
        $date_start=$request->get('date_start');
        $date_end=$request->get('date_end');
        $style="";
        $rooms = DB::select("call report_clean('$date_start', '$date_end','$action_type')");   
        $result = DB::select("call notification_reservation");
        return view('reports/cleaning')->with('result', $result)->with('rooms', $rooms)->with('action_type', $action_type)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);          
    }

     public function ReporProvision()
    {
        $date_start='0000-10-10';
        $date_end="000-12-12";
        $style="display: none";
        $provi = DB::select("call report_provisions('$date_start', '$date_end')");   
        $result = DB::select("call notification_reservation");
      return view('reports/Provision')->with('result', $result)->with('provi', $provi)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);        
    }

     public function reporProvisionTip(Request $request)
    {
        $date_start=$request->get('date_start');
        $date_end=$request->get('date_end');
        $style="";
        $provi = DB::select("call report_provisions('$date_start', '$date_end')");   
        $result = DB::select("call notification_reservation");
      return view('reports/Provision')->with('result', $result)->with('provi', $provi)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);        
    }

    public function ReporIncomeExp()
    {   $tipo='6';
        $date_start='0000-10-10';
        $date_end="000-12-12";
        $style="display: none";
        $incomexp = DB::select("call report_incomexp($tipo, '$date_start', '$date_end')");   
        $result = DB::select("call notification_reservation");
        return view('reports/IncomeExp')->with('result', $result)->with('incomexp', $incomexp)->with('tipo', $tipo)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);         
    }

    public function reporIncomeExpTip(Request $request)
    {
        $tip=$request->get('tipo');
        $date_start=$request->get('date_start');
        $date_end=$request->get('date_end');
        $style="";
        $incomexp = DB::select("call report_incomexp($tip, '$date_start', '$date_end')");     
        $result = DB::select("call notification_reservation");

     
        if($tip=="0"){
             $tipo="Gastos";
        }else{
             $tipo="Ingresos";
        }
        
        $result = DB::select("call notification_reservation");
        return view('reports/IncomeExp')->with('result', $result)->with('incomexp', $incomexp)->with('tipo', $tipo)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);         
    }
}
