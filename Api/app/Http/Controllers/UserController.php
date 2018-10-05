<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User_Flight;


class UserController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = (new User_Flight )->crear_usuario([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if($user!=null)
        {
            return response()->json(['Exito'=>'El nuevo usuario se ha creado exitosamente','Usuario'=>$request->name,'email'=>$request->email],201,[]);
        }

        return response()->json(['Error'=>'Problemas al crear usuario'],401,[]);     
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = (new User_Flight)->login($credentials)) {
            return response()->json(['Error' => 'Problemas para iniciar session, password o email erroneo'], 401);
        }
        return response()->json(['token' => $token,'message'=>'Sesion iniciada exitosamente']);
    
    }
}