<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Tymon\JWTAuth\Facades\JWTAuth;
// use Tymon\JWTAuth\Exceptions\JWTException;

class UsersController extends Controller
{
    /*public function authenticate(Request $request)
    {
        
        // $User = User::find(1);

        // if (!$User) {
        //     return response()->json([
        //         'message' => 'Usuario não encontrado'
        //     ], 404);
        // }

        // return response()->json($User, 201);

        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:User',
                'password' => 'required|string|min:6|confirmed',
            ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return response()->json(compact('user'));
    }*/

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
