<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function payment(Request $request)
    {
        return response()->json([
            'success' => true,
        ]);
    }
}
