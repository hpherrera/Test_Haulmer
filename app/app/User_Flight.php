<?php

namespace App;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Jwtoken;
use Illuminate\Support\Facades\Hash;

class User_Flight 
{
	/* Creo el usuario */
    public function crear_usuario($usuario)
    {
    	foreach (User_Flight::usuarios() as $old_usuario) {
    		if ($old_usuario['email'] === $usuario['email']){
    			return null; //email utilizado
    		}
    	}

    	$client = new Client(['base_uri' => 'http://5bb26ef177063c0014a7d209.mockapi.io/api/v1/']);
        $response = $client->request('POST', 'users',['json' => $usuario]);

        return response()->json($usuario);
        
        
    }

    /* Obtengo todo los usuarios */
    public function usuarios()
    {
    	$client = new Client(['base_uri' => 'http://5bb26ef177063c0014a7d209.mockapi.io/api/v1/']);
        $response = $client->request('GET', 'users');

        return json_decode((string) $response->getBody(), true);
    }

    public function login($credenciales)
    {
    	foreach (User_Flight::usuarios() as $usuario) {
            if ($usuario['email'] === $credenciales['email'] && Hash::check($credenciales['password'], $usuario['password']))
            {
            	//dd("entro");
                $token = Jwtoken::JwtIn([
                    'id' => $usuario['id'],
                    'email' => $usuario['email'],
                    'password' => $usuario['password'],
                    'name' => $usuario['name']
                ]); 
                
                //dd($token);
                return $token;
            }
        }
        return "nope";
    }
}
