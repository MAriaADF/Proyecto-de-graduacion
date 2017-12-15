<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Provision;
use App\HistoryProvision;


class ProvisionController extends Controller
{
       
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *muestra los detalles de las provisiones 
     *en entrada de suministros
     * @return \Illuminate\Http\Response
     */
    public function indexInput()
    {
        $result = DB::select("call notification_reservation");
        $provi = Provision::all();
        return view('provision/input', compact('provi'))->with('result', $result);
    }

    /*muestra los detalles de las provisiones 
     *en salida de suministros
     * @return \Illuminate\Http\Response
     */
    public function indexOutput()
    {
        $result = DB::select("call notification_reservation");
        $provi = Provision::all();
        return view('provision/output', compact('provi'))->with('result', $result);
    }


     public function create(){
         $result = DB::select("call notification_reservation");
         $provi = Provision::all();
        return view('provision/inventory_current', compact('provi'))->with('result', $result);
    }
    

      public function edit(Request $request, $id)
    {
        $detail=$request->get('detail');
        try{
              DB::beginTransaction();

        $result = DB::select("call notification_reservation");
        $hist = DB::select("call history_provisions($id)");

        return view('provision/history')->with('hist', $hist)->with('result', $result)->with('detail', $detail);
               

            }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
    }
    
    
     public function storeInput(Request $request)
     { 
        //entrada de provision
        $id=$request->get('id');
        $type='0';

        try{
              DB::beginTransaction();
                
        $action_type= 'Entrada';
        $provision = Provision::find($id);
        $provision->quantity = $request->get('quantity') + $provision->quantity ;
        $provision->save();

      $hist = DB::table('history_provisions')->insert(
        [  
            'quantity'=>$request->get('quantity'),
            'type'=>$type,
            'action_type'=>$action_type,
            'id_provision' => $id,
            'id_user' => Auth::user()->id
            ]);
        $result = DB::select("call notification_reservation");
         $provi = Provision::all();
        if( !$provision || !$hist ){
                  DB::rollback();
                } else {
                    DB::commit(); 
                    return redirect('/input')-> with('status', 'Ingreso de inventario satisfactorio')->with('result', $result);
                }

            }
            catch(\Exception $e){
               return redirect('/output')-> with('error', 'Ocurrio un error a realizar la consulta');
                DB::rollback();
            }
    }



     public function storeOutput(Request $request)
     { 
        $id=$request->get('id');
        $action_type= 'Salida';
         try{
               DB::beginTransaction();

        $provision = Provision::find($id);
        $type='0';

        if( $provision->quantity > $request->get('quantity')){

            $provision->quantity = $provision->quantity - $request->get('quantity') ;
            $provision->save();
            $result = DB::select("call notification_reservation");
            $hist = DB::table('history_provisions')->insert(
            [  
                'quantity'=>$request->get('quantity'),
                
                'type'=>$type,
                'action_type'=>$action_type,
                'id_provision' => $id,
                'id_user' => Auth::user()->id
                ]);   
         $provi = Provision::all();
        }else{
             return redirect('/output')-> with('error', 'La salida es mayor a la existencia actual, verifique');
        }
        
        if( !$provi || !$hist )
                {
                  DB::rollback();
                } else {
                    DB::commit(); 
                      return redirect('/output')-> with('status', 'Salida de inventario satisfactorio')->with('result', $result);
                }

            }
            catch(\Exception $e){
                  return redirect('/output')-> with('error', 'Ocurrio un error a realizar la consulta');
                DB::rollback();
            } 
    }

    public function indexProvi()
    {

        $result = DB::select("call notification_reservation");
        $provi = Provision::all();
        return view('configuration/register_provi', compact('provi'))->with('result', $result);
    }

    public function registerProvi(Request $request)
    {
      $provi= new Provision;
        $provi->detail = $request->get('detail');
        $provi->quantity = "0";
        $provi->state = "1";
        $provi->save();

        if( !$provi)
        {
          DB::rollback();
        } else {
          DB::commit();    
          $result = DB::select("call notification_reservation");
          return view('configuration/register_provi')->with('result', $result);
        }
    }
}
