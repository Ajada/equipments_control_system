<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Prophecy\Exception\Doubler\ReturnByReferenceException;

class AuthController extends Controller
{
    /**
     * Login na plataforma
     * 
     * @return token
    */
    public function login(Request $request)
    {
        $data = $request->all(['email', 'password']);

        $jwt = auth('api')->attempt($data);

        if(!$jwt)
            return response()->json(['error' => 'user does not exists'], 403);

        return response()->json(['token' => $jwt]);
    }

    /**
     * Renova o token da sessão de cliente
     * 
     * @return 
     */
    public function refresh()
    {
        $new_token = auth('api')->refresh();
        return response()->json(['token' => $new_token]);
    }

    /**
     * Retorna os dados do usuário
     * 
     * @return App\Models\User
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Coloca o token na blacklist - inativa o token
     * 
     * @return array
     */
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['msg' => 'logged out with successfully']);
    }

}
