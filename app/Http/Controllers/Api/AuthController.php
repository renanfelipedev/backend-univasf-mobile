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
            'ds_login' => 'required',
            'ds_senha' => 'required'
        ]);

        $usuario = Usuario::where('ds_login', $request->ds_login)->first();

        $token = auth()->guard('api')->login($usuario);
        $user = auth()->guard('api')->user();

        return response()->json([
            'token' => $token,
            'type' => 'Bearer',
            'user' => [
                'id_usuario' => $user->id_usuario,
                'ds_cpf' => $user->ds_cpf,
                'ds_nomepessoa' => $user->pessoa->ds_nomepessoa
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
