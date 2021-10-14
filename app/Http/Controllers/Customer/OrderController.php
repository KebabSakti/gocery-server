<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $result = 'mitra';
        $langsung = false;
        $terjadwal = false;
        $eksklusif = false; //Produk yang dijual oleh mitra dan kantor dengan jenis pengiriman LANGSUNG

        foreach ($request->items as $item) {
            if ($item['product_delivery_type'] == 'LANGSUNG' && $item['product_is_exclusive'] == 0) {
                $langsung = true;
            }

            if ($item['product_delivery_type'] == 'TERJADWAL' && $item['product_is_exclusive'] == 0) {
                $terjadwal = true;
            }

            if ($item['product_delivery_type'] == 'LANGSUNG' && $item['product_is_exclusive'] == 1) {
                $eksklusif = true;
            }
        }

        if ($eksklusif == true && ($langsung == false && $terjadwal == false)) {
            $result = 'mitra';
        } else {
            $result = 'kantor';
        }

        return response()->json($result);
    }
}
