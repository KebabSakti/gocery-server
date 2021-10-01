<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    private $auth = 'Basic eG5kX2RldmVsb3BtZW50XzJhRDJBODc1Y01FRTg4THNyQ3Mzb0VOcW9mY0FsaG5aWnpyOWxxR2lscm9JTnlva1hIRUFLYkw1MGM1a006';

    public function __construct()
    {
        // Xendit::setApiKey(env('XENDIT_KEY'));
    }

    public function invoice(Request $request)
    {
        $params = [
            'external_id' => 'INV002',
            'amount' => 10000,
            'payment_methods' => ['OVO'],
            'customer' => [
                  'given_names' => 'Ryo',
                  'email' => 'julian.aryo1989@gmail.com',
                  'mobile_number' => '+6281254982664',
            ],
        ];

        $response = Http::withHeaders([
            'Authorization' => $this->auth,
            'Accept' => 'application/json',
        ])
        ->post('https://api.xendit.co/v2/invoices', $params);

        return $response->body();
    }
}
