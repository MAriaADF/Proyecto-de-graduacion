<?php

namespace App\Http\Controllers;

use Validator;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $result = DB::select("call notification_reservation");
         
          $person = Person::where('person.state','!=',"0")->get();
        return view('clients/search', compact('person'))->with('result', $result);
    }

    public function showPerson(Request $request, $id){
             if($request->ajax()){
                $person = Person::where('id','=',$id)->get(); 
                return response()->json($person);
            }
        }

     public function showClient()
    {
        $result = DB::select("call notification_reservation");
        return view('clients/registro_usu')->with('result', $result);
    }

     public function store(Request $request)
     {

        try{
              DB::beginTransaction();

                $rules=array( 
                    'phone'=>'required|unique:person', 
                    );

                $validator=Validator::make($request->all(),$rules);
                
                if ($validator->fails())
                {
                    return response()->json(['mensaje'=>'error','codigo'=>'201'],201);
                }

               $person = DB::table('person')->insertGetId(
                [   
                    'name'=>$request->get('name'),
                    'last_name_1'=>$request->get('last_name_1'),
                    'last_name_2'=>$request->get('last_name_2'),
                    'phone'=>$request->get('phone'),
                    'email'=>$request->get('email'),
                    'state'=>"2",
                ]);

              $result = DB::select("call notification_reservation");

         if( !$person )
                {
                  DB::rollback();
                } else {
                    DB::commit(); 
                    return view('clients/registro_usu')->with('result', $result);
                }

           }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
    }

    public function edit( $id)
    {
        try{
                $person = Person::findOrFail($id);
                $result = DB::select("call notification_reservation");
                return view('clients/edit', compact('person','id'))->with('result', $result);

           }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
    }

     /* Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         try{

            $person = Person::find($id);
            $person->name = $request->get('name');
            $person->last_name_1 = $request->get('last_name_1');
            $person->last_name_2 = $request->get('last_name_2');
            $person->phone = $request->get('phone');
            $person->email = $request->get('email');
            $person->save();
                 $result = DB::select("call notification_reservation");
        $person = Person::where('state','=',"2")->get();
        return view('clients/search', compact('person'))->with('result', $result);

           }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
        
    }

    /* Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
         try{

            $person = Person::find($id);
            $person->state = "0";
            $person->save();
            $result = DB::select("call notification_reservation");
            $person = Person::where('state','=',"2")->get();
            return view('clients/search', compact('person'))->with('result', $result);

           }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
        
    }

    /* Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function historialClient( $id)
    {
         try{

            $reservation = DB::select("call rervas_search_id($id)");
            $result = DB::select("call notification_reservation");
            return view('clients/history')->with('result', $result)->with('reservation', $reservation);

           }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
        
    }
    
}
