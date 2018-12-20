<?php

namespace App\Http\Controllers;

use App\Users;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index()
    {
        $Users = Users::all();
        return response()->json($Users);
    }

    public function show($id)
    {
        $User = Users::find($id);

        if (!$User) {
            return response()->json([
                'message' => 'Usuario não encontrado'
            ], 404);
        }

        return response()->json($User, 201);
    }

    public function store(Request $request)
    {
        $User = new Users;
        $User->fill($request->all());
        $User->save();
        return response()->json($User, 201);
    }

    public function update(Request $request, $id)
    {
        $User =  Users::find($id);

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
        $User =  Users::find($id);

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
