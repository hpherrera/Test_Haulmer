<?php

namespace App\Http\Controllers;
use App\Jwtoken;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function show(Request $request)
    {

        $id = ApiController::validarToken($request->bearerToken())->id;
        if($id!=null)
        {
             $client = new Client(['base_uri' => 'http://5bb26ef177063c0014a7d209.mockapi.io/api/v1/']);
            $response = $client->request('GET', 'users/'.$id);
            return $response->getBody();
        }
        return response()->json(['Error'=>'No autorizado'],401,[]);  

       
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }
        
        $user = ApiController::validarToken($request->bearerToken());
        if($user!=null)
        {
            $user->password = bcrypt($request['password']);
            $user->name = $request['name'];
            $user->email = $request['email'];

            $id = $user->id;

            $client = new Client(['base_uri' => 'http://5bb26ef177063c0014a7d209.mockapi.io/api/v1/']);
            $response = $client->request('PUT', 'users/'.$id,['json'=>$user]);

            return response()->json(['Exito'=>'Datos modificados exitosamente'],201,[]);
        }
        return response()->json(['Error'=>'Problemas al modificar datos'],401,[]);  
            
    }

    public function delete(Request $request)
    {
        $id = validarToken($request->bearerToken())->id;

        if($id!=null)
        {
            $client = new Client(['base_uri' => 'http://5bb26ef177063c0014a7d209.mockapi.io/api/v1/']);
            $response = $client->request('DELETE', 'users/'.$id);

            return response()->json(['Error'=>'usuario eliminado exitosamente'],200,[]);
        }
        return response()->json(['Error'=>'Problemas al eliminar usuario'],401,[]);  

        
    }

    public function validarToken($token)
    {
        $user = Jwtoken::GetData($token);
        return $user;
    }
}
