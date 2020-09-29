<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Promotor;
use App\Prospecto;
use Response;

class LoginController extends Controller
{
  
    function Login(Request $request)
    {
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|min:8'
     ]);
     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );
     if(Auth::attempt($user_data)){
        return response()->json(['redirect' => true, 'success' => true], 200);
        
       }else{
        return
        response([
            'success' => false,
            'message' => 'Credenciales Invalidas,intenta nuevamente'
        ], Response::HTTP_FORBIDDEN);

       }
    
     
    }
   



}
