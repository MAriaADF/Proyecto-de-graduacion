<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\HisHabitRequest;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\HistoryHabitation;
use App\Room;
use JWTAuthException;

class HistoryHabitationsController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $room = Room::where('state','=','0')->get();
          return response()->json(
            $room,
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HisHabitRequest $request)
    {
       $user = JWTAuth::toUser($request->token);
        $id = $user['id'];
        $action_type = 'Limpieza';

        $habitation = new HistoryHabitation;
        $habitation->observation = $request->input('observation');
        $habitation->action_type = $action_type;
        $habitation->id_user = $id;
        $habitation->id_room = $request->input('id_room');
        if ($habitation->save()) {
            return $habitation;
        }
        throw new HttpException(400, "Invalid data");
        
    }

    
   
}
