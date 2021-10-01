<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $sayur = false;
        $lain = false;

        foreach ($request->items as $item) {
            if ($sayur == false) {
                $sayur = ($item['product_delivery_type'] == 'TERJADWAL') ? true : false;
            }

            if ($lain == false) {
                $sayur = ($item['product_delivery_type'] == 'LANGSUNG' && $item['product_is_exclusive'] == false) ? true : false;
            }
        }

        if ($sayur == false && $lain == false) {
            $kurir = 'MITRA';
        } else {
            $kurir = 'KANTOR';
        }

        return response()->json([
            'sayur' => $sayur,
            'lain' => $lain,
            'kurir' => $kurir,
        ]);
    }
}
