<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HistProviController extends Controller
{
       
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select("call notification_reservation");
        $hist = DB::select("call history_provisions (6)");
        return view('provision/history')->with('hist', $hist)->with('result', $result);
    }
}
