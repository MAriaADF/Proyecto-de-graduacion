<?php

namespace App\Http\Controllers;

use App\Person;
use App\Provision;
use App\Reservation;
use App\Http\Requests;
use App\RoomReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class RoomReservationController extends Controller
{
	
    /**
     * Elimina la habiatación que esta asociada a la reserva
     *
     * @param  int  $id, int $id_person,  int  $id_reservation
     * @return la vista de editar reserva 
     */
    public function destroy($id,$id_person, $id_reservation)
    {
    	$action_type ='Eliminación habiatación';

    	try{
              DB::beginTransaction();
            
	        $roomm = RoomReservation::find($id); 
	        if(!$roomm==null){
	        $roomm->delete();

	        $his =DB::table('history_reservations')->insert(
	                [
	                'action_type'=>$action_type,
	                'id_user'=> Auth::user()->id,
	                'id_reservation' => $id_reservation,
	                ]);
         if( !$roomm || !$his)
                {
                  DB::rollback();
                } else {
                    DB::commit(); 
                    return  $this->mostrar($id_person, $id_reservation);
                }
            }
            return  $this->mostrar($id_person, $id_reservation);
           }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
        
    }

    /**
     * Modifica la reserva, el cual solo permite agregar una o varias habitaciones a dicha reserva 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_person,  int $id_reservation
     * @return  retorna la vista de editar reserva
     */
    public function update(Request $request, $id_person, $id_reservation)
    {
         $state='1';
        $action_type ='Modificación habitación';

       try{
              DB::beginTransaction();

                $room_reservations = DB::table('room_reservations')->insert(
                [
                    'pax_num'=>$request->get('pax'),
                    'price'=>$request->get('total'),
                    'id_room'=>$request->get('room'),
                    'id_reservation' => $id_reservation,
                ]);

               $his =DB::table('history_reservations')->insert(
                [
                'action_type'=>$action_type,
                'id_user'=> Auth::user()->id,
                'id_reservation' => $id_reservation,
                ]);

               if( !$room_reservations || !$his)
                {
                  DB::rollback();
                } else {
                    DB::commit(); 
                  return  $this->mostrar($id_person, $id_reservation);
                }

           }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
    }

    /**
     * muestra los datos del cliente, reserva y habitaciones 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_person,  int $id_reservation
     * @return  retorna la vista de editar reserva
     */
    public function mostrar($id_person, $id_reservation){
        try{
    		$person = Person::findOrFail($id_person);
	        $reservation = Reservation::findOrFail($id_reservation);
            $result = DB::select("call notification_reservation");
	        $room = DB::select("CALL room_reservation($id_reservation)");

             return view('reservation/edit', compact('person', 'reservation', 'room'))->with('result', $result);
        }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
    }
}
