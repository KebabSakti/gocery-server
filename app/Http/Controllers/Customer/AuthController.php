<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerLinkedAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:sanctum')->except(['authenticate', 'exist']);
    }

    public function authenticate(Request $request)
    {
        $customer = Customer::where('customer_phone', $request->customer_phone)
                            ->where('customer_phone', '!=', null)
                            ->first();

        if (empty($customer)) {
            $link = CustomerLinkedAccount::where('customer_linked_account_email', $request->customer_email)->first();

            if (empty($link)) {
                $customer = Customer::create([
                        'customer_id' => Str::uuid(),
                        'customer_name' => $request->customer_name,
                        'customer_email' => $request->customer_email,
                    ]);

                CustomerLinkedAccount::create([
                        'customer_id' => $customer->customer_id,
                        'customer_linked_account_id' => Str::uuid(),
                        'customer_linked_account_name' => $request->customer_name,
                        'customer_linked_account_email' => $request->customer_email,
                        'customer_linked_account_type' => $request->auth_type,
                    ]);
            } else {
                $customer = Customer::where('customer_id', $link->customer_id)->first();
            }
        }

        $token = $customer->createToken($customer->customer_id)->plainTextToken;

        $customer->token = $token;

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $customer,
            ]
        );
    }

    public function update(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
        ]);

        if ($validator->fails()) {
            DB::rollBack();

            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'data' => null,
                ]
            );
        }

        $user = Customer::where('customer_id', $request->customer_id)->first();

        if (empty($user)) {
            DB::rollBack();

            return response()->json(
                [
                    'success' => false,
                    'message' => 'User tidak ditemukan',
                    'data' => null,
                ]
            );
        }

        if (!empty($request->customer_phone)) {
            $user->customer_phone = $request->customer_phone;
        }

        if (!empty($request->customer_name)) {
            $user->customer_name = $request->customer_name;
        }

        if (!empty($request->customer_email)) {
            $user->customer_email = $request->customer_email;
        }

        if (!empty($request->customer_password)) {
            $user->customer_password = $request->customer_password;
        }

        if (!empty($request->customer_fcm)) {
            $user->customer_fcm = $request->customer_fcm;
        }

        if (!empty($request->customer_point)) {
            $user->customer_point = $request->customer_point;
        }

        $user->save();

        $token = $user->createToken($request->customer_id)->plainTextToken;

        $user->token = $token;

        DB::commit();

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $user,
            ]
        );
    }

    public function revoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'data' => null,
                ]
            );
        }

        $user = Customer::where('customer_id', $request->customer_id)->first();

        $user->tokens()->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'Anda berhasil logout',
                'data' => null,
            ]
        );
    }

    public function exist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'exists:customers',
            'customer_phone' => 'exists:customers',
            'customer_email' => 'exists:customers',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'data' => null,
                ]
            );
        }

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => null,
        ]);
    }

    public function register(Request $request)
    {
        $exists = Customer::where('customer_email', $request->customer_email)
                          ->orWhere('customer_phone', $request->customer_phone)
                          ->first();

        if (!empty($exists)) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'User sudah terdaftar menggunakan email atau telp tersebut',
                    'data' => null,
                ]
            );
        }

        $customer = Customer::create([
            'customer_id' => Str::uuid(),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
        ]);

        $token = $customer->createToken($customer->customer_id)->plainTextToken;

        $customer->token = $token;

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $customer,
            ]
        );
    }
}
