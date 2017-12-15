<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use View;
use Validator;
use Hash;
use Redirect;

class UserController extends Controller
{
     

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function changePassword()
    {
        $result = DB::select("call notification_reservation");
        return view('configuration/change_password')->with('result', $result);
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('configuration/change_password')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('user', '=', Auth::user()->user)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('configuration/change_password')->with('status', 'Password cambiado con éxito');
            }
            else
            {
                return redirect('configuration/change_password')->with('message', 'Credenciales incorrectas');
            }
        }
    }
      
}
