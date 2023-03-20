<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function listado(){
        $users = User::select('users.id as id','users.name as full_name', 'users.tipo as role', 'users.name as username','users.email as email','users.profile_photo_path as avatar','users.estado as status' )
                        ->where('tipo','!=','administrador' )
        ->get();

        $data['data'] = $users;
        return response::json($data);
    }
    public function total(){
        $users = User::where('tipo','!=','administrador' )->count();
        return response::json($users);
    }

    public function usuario($id){
        $usuario = User::find($id);

        return response::json($usuario);
    }
}
