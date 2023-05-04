<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SGS\Usuario;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required',
        ]);

        $usuario = Usuario::where('ds_login', $request->login)->first();

        $token = auth()->guard('api')->login($usuario);
        $user = auth()->guard('api')->user();

        return response()->json([
            'token' => $token,
            'type' => 'Bearer',
            'user' => [
                'id' => $user->id_usuario,
                'cpf' => $user->ds_cpf,
                'nome' => $user->pessoa->ds_nomepessoa,
                'email' => $user->pessoa->ds_emailprincipal
            ]
        ]);
    }

    public function destroy()
    {
        if (auth()->guard('api')->check()) {
            auth()->logout();
        }

        return response('', 204);
    }
}
