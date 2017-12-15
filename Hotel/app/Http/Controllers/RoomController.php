<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Room;
use App\HistoryHabitation;

class RoomController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    // public function indexInput()
    public function indexRoom()
    {       
    $room = Room::where('state','=',0)->get(); 
    $result = DB::select("call notification_reservation");
        return view('rooms/cleaning', compact('room'))->with('result', $result);       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_room=$request->get('room');
        $action_type = 'Limpieza';
        $state="1";

        $rese = Room::find($id_room);
        $rese->state= $state;
        $rese->save();

        $habitation = new HistoryHabitation;
        $habitation->observation = $request->get('observation');
        $habitation->action_type = $action_type;
        $habitation->id_user = Auth::user()->id;
        $habitation->id_room = $id_room;
        $habitation->save();

        $room = Room::where('state','=',2)->get(); 
        $result = DB::select("call notification_reservation");
        return view('rooms/cleaning', compact('room'))->with('result', $result);       
    }

    public function indexRoomMante()
    {       
        $hist = Room::where('state', '=', 2)->get();
        $room = Room::where('state', '!=', 2)->get();
        $result = DB::select("call notification_reservation");
        return view('rooms/maintenance', compact('room'))->with('result', $result)->with('hist', $hist);     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMante(Request $request)
    {
        $id_room=$request->get('room');
        $action_type = 'Mantenimiento';
        $state="2";

        $rese = Room::find($id_room);
        $rese->state= $state;
        $rese->save();

        $habitation = new HistoryHabitation;
        $habitation->observation = $request->get('observation');
        $habitation->action_type = $action_type;
        $habitation->id_user = Auth::user()->id;
        $habitation->id_room = $id_room;
        $habitation->save();

         $hist = Room::where('state', '=', 2)->get();
        $room = Room::where('state', '!=', 2)->get();
        $result = DB::select("call notification_reservation");
        return view('rooms/maintenance', compact('room'))->with('result', $result)->with('hist', $hist);         
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manteEnd(Request $request)
    {
       
       $id= $request->get('id_room');

        $rese = Room::find($id);
        $rese->state= "1";
        $rese->save();

        $habitation = new HistoryHabitation;
        $habitation->action_type = 'Fin de mantenimiento';
        $habitation->id_user = Auth::user()->id;
        $habitation->observation = $request->get('observation');
        $habitation->id_room = $id;
        $habitation->save();

         $hist = Room::where('state', '=', 2)->get();
        $room = Room::where('state', '!=', 2)->get();
        $result = DB::select("call notification_reservation");
        return view('rooms/maintenance', compact('room'))->with('result', $result)->with('hist', $hist);         
    }

    public function histRoom()
    {     
      
    $hist= HistoryHabitation::join('users', 'users.id', '=', 'history_habitations.id_user')->join('room', 'room.id', '=', 'history_habitations.id_room')
            ->select('history_habitations.*', 'users.user', 'room.number')->get();
    $result = DB::select("call notification_reservation");
        return view('rooms/history', compact('room'))->with('result', $result)->with('hist', $hist);         
    }
}
