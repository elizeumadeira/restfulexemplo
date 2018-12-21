<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function open()
    {
        return response()->json([
            'message' => 'This data is open and can be accessed without the client being authenticated'
        ], 200);
    }

    public function closed()
    {
        return response()->json([
            'message' => 'Only authorized users can see this',
            'status' => 'error'
        ], 200);
    }
}
