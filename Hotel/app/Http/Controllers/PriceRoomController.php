<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PriceRoom;
use App\HistoryPriceRoom;

class PriceRoomController extends Controller
{
    //
    public function indexRoo(Request $request, $pax){
             if($request->ajax()){
                $price = PriceRoom::pricee($pax);
                return response()->json($price);
            }
        }


public function index()
    {
        $price_room = PriceRoom::all();
       $result = DB::select("call notification_reservation");
        return view('configuration/price_room')->with('result', $result)->with('price_room', $price_room);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id');
        $priceroom = PriceRoom::find($id);
        $priceroom->price = $request->get('sum');
        $priceroom->save();

        $habitation = new HistoryPriceRoom;
        $habitation->date = date('Y-m-d');
        $habitation->price = $request->get('sum');
        $habitation->id_user = Auth::user()->id;
        $habitation->id_price_room = $id;
        $habitation->save();
        
        $price_room = PriceRoom::all();
       $result = DB::select("call notification_reservation");
        return view('configuration/price_room')->with('result', $result)->with('price_room', $price_room);
    }
}
