<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Person;
use App\User;
// Indicamos que trabajamos con Vistas
use View;

// Validación de formularios.
use Validator;

// Redireccionamientos.
use Redirect;



class PersonUserController extends Controller
{

    public function show()
    {
        $result = DB::select("call notification_reservation");
        return view('configuration/registro_usu')->with('result', $result);
    }

    public function showUser()
    {
        $person = Person::join('users', 'person.id', '=', 'users.id_person')
            ->select('person.*', 'users.user', 'users.id as id_user')
            ->where('person.state','=',"1")
            ->where('users.state','=',"1")->get();
        $result = DB::select("call notification_reservation");
        return view('configuration/search_User')->with('result', $result)->with('person', $person);
    }

     public function store(Request $request)
     {
        $password='password1';
        $is_admin='0';

        try{
              DB::beginTransaction();

                $rules=array(
                    'email'=>'required|unique:person', 
                    'phone'=>'required|unique:person', 
                    );

                $validator=Validator::make($request->all(),$rules);
                
                if ($validator->fails())
                {
                    return response()->json(['mensaje'=>'error','codigo'=>'201'],201);
                }

                if(null!==($request->get("is_admin"))){
                    $is_admin='1';

                }
              $persona =  Person::create([
                    'name'=>$request->get('name'),
                    'last_name_1'=>$request->get('last_name_1'),
                    'last_name_2'=>$request->get('last_name_2'),
                    'phone'=>$request->get('phone'),
                    'email'=>$request->get('email'),
                ]);

              $user = DB::table('users')->insert(
                [
                    'user'=>$request->get('user'),
                    'password' => bcrypt($password),
                    'roll'=>$is_admin,
                    'id_person' => $persona->id,
                    ]);
              $result = DB::select("call notification_reservation");

         if( ! $persona || !$user )
                {
                  DB::rollback();
                } else {
                    DB::commit(); 
                    return view('configuration/registro_usu')->with('result', $result);
                }

           }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $id_user)
    {
        $person = Person::find($id);
        $users =User::find($id_user);
        $result = DB::select("call notification_reservation");
        return view('configuration/edit_usu')->with('result', $result)->with('users', $users)->with('person', $person);
    }

    /* Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id_user)
    {
         try{

            $person = Person::find($id);
            $person->name = $request->get('name');
            $person->last_name_1 = $request->get('last_name_1');
            $person->last_name_2 = $request->get('last_name_2');
            $person->phone = $request->get('phone');
            $person->email = $request->get('email');
            $person->save();

            $user = User::find($id_user);
            $user->user = $request->get('user');
            $user->save();

             $person = Person::join('users', 'person.id', '=', 'users.id_person')
                ->select('person.*', 'users.user', 'users.id as id_user')
                ->where('person.state','=',"1")
                ->where('users.state','=',"1")->get();
            $result = DB::select("call notification_reservation");
            return view('configuration/search_User')->with('result', $result)->with('person', $person);

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
    public function destroy( $id_user)
    {
         try{

            $per = User::find($id_user);
            $per->state = "0";
            $per->save();
            $person = Person::join('users', 'person.id', '=', 'users.id_person')
            ->select('person.*', 'users.user')
            ->where('person.state','=',"1")
            ->where('users.state','=',"1")->get();
        $result = DB::select("call notification_reservation");
        return view('configuration/search_User')->with('result', $result)->with('person', $person);

           }
            catch(\Exception $e){
                print_r("Ocurrio un fallo a nivel de codigo");
                DB::rollback();
            }
        
    }

public function history($id)
    {       
        $date_start='0000-10-10';
        $date_end="000-12-12";
         $style="display: none";
        $reserva = DB::select("call history_user_reserv($id,'$date_start', '$date_end')");
        $room = DB::select("call history_user_room($id,'$date_start', '$date_end')"); 
        $incomex = DB::select("call history_user_incomex($id,'$date_start', '$date_end')");         
        $result = DB::select("call notification_reservation");

        return view('configuration/history')->with('result', $result)->with('reserva', $reserva)->with('room', $room)->with('incomex', $incomex)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style)->with('id', $id);
    }

    public function showHistory(Request $request)
    {     
        $id=$request->get('id');
        $date_start=$request->get('date_start');
        $date_end=$request->get('date_end');
        $style="";
        $reserva = DB::select("call history_user_reserv($id,'$date_start', '$date_end')");
        $room = DB::select("call history_user_room($id,'$date_start', '$date_end')");
        $incomex = DB::select("call history_user_incomex($id,'$date_start', '$date_end')");        
        $result = DB::select("call notification_reservation");

        return view('configuration/history')->with('result', $result)->with('reserva', $reserva)->with('room', $room)->with('incomex', $incomex)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style)->with('id', $id);
    }
   
}
