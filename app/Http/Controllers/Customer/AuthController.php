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
    public function authenticate(Request $request)
    {
        $customer = Customer::where('customer_id', $request->customer_id)
                            ->orWhere('customer_phone', $request->customer_phone)
                            ->first();

        if (empty($customer)) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'User tidak ditemukan',
                    'data' => null,
                ]
            );
        }

        $customer->update([
            'customer_fcm' => $request->customer_fcm,
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

    public function social(Request $request)
    {
        $customer = Customer::where('customer_email', $request->customer_email)
                            ->orWhereHas('customer_linked_accounts', function ($q) use ($request) {
                                $q->where('customer_linked_account_email', $request->customer_email);
                            })
                            ->first();

        if (empty($customer)) {
            $customer = Customer::create([
                    'customer_id' => Str::uuid(),
                    'customer_name' => $request->customer_name,
                    'customer_email' => $request->customer_email,
                    'customer_fcm' => $request->customer_fcm,
                ]);

            CustomerLinkedAccount::create([
                'customer_id' => $customer->customer_id,
                'customer_linked_account_id' => Str::uuid(),
                'customer_linked_account_name' => $request->customer_name,
                'customer_linked_account_email' => $request->customer_email,
                'customer_linked_account_type' => $request->auth_type,
            ]);
        } else {
            if ($customer->customer_linked_accounts->count() == 0) {
                CustomerLinkedAccount::create([
                    'customer_id' => $customer->customer_id,
                    'customer_linked_account_id' => Str::uuid(),
                    'customer_linked_account_name' => $request->customer_name,
                    'customer_linked_account_email' => $request->customer_email,
                    'customer_linked_account_type' => $request->auth_type,
                ]);
            } else {
                if ($customer->customer_linked_accounts->first()->customer_linked_account_type != $request->auth_type) {
                    CustomerLinkedAccount::create([
                        'customer_id' => $customer->customer_id,
                        'customer_linked_account_id' => Str::uuid(),
                        'customer_linked_account_name' => $request->customer_name,
                        'customer_linked_account_email' => $request->customer_email,
                        'customer_linked_account_type' => $request->auth_type,
                    ]);
                }
            }

            $customer = Customer::where('customer_id', $customer->customer_id)->first();
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

    public function register(Request $request)
    {
        $customer = Customer::create([
            'customer_id' => Str::uuid(),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_fcm' => $request->customer_fcm,
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

    public function exist(Request $request)
    {
        $customer = Customer::whereHas('customer_linked_accounts', function ($q) use ($request) {
            $q->where('customer_linked_account_email', $request->customer_email);
        })
        ->orWhere(function ($q) use ($request) {
            $q->where('customer_email', $request->customer_email)
                ->orWhere('customer_phone', $request->customer_phone);
        })
        ->first();

        if (!empty($customer)) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Nomor hp atau email sudah terdaftar',
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
}
