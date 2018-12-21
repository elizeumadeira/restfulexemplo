<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use JWTAuth;
// use Tymon\JWTAuth\Exceptions\JWTException;

class UsersController extends Controller
{
    //
    public function index()
    {
        $User = User::all();
        return response()->json($User);
    }

    public function show($id)
    {
        $User = User::find($id);

        if (!$User) {
            return response()->json([
                'message' => 'Usuario não encontrado'
            ], 404);
        }

        return response()->json($User, 201);
    }

    public function store(Request $request)
    {
        $User = new User;
        $User->fill($request->all());
        $User->save();
        return response()->json($User, 201);
    }

    public function update(Request $request, $id)
    {
        $User =  User::find($id);

        if (!$User) {
            return response()->json([
                'message' => 'Usuario não encontrado'
            ], 404);
        }

        $User->fill($request->all());
        $User->save();

        return  response()->json($User, 201);
    }

    public function destroy($id)
    {
        $User =  User::find($id);

        if (!$User) {
            return response()->json([
                'message' => 'Usuario não encontrado'
            ], 404);
        }
        
        $User->delete();

        return response()->json([
            'message' => 'Usuario excluído com sucesso'
        ], 200);
    }
}
