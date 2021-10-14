<?php

namespace App\Http\Controllers;

use App\Jobs\ProsessMessage;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    public function debug(Request $request)
    {
        ProsessMessage::dispatch();

        return response()->json('OKE');
    }
}
