<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function cart(Request $request)
    {
        $cartItems = CartItem::with(['product' => function ($q) {
            $q->where('product_active', 1);
        }])->where('customer_id', Auth::user()->customer_id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $cartItems,
            ]
        );
    }

    public function cartUpdate(Request $request)
    {
        CartItem::where('customer_id', Auth::user()->customer_id)->delete();

        if (!empty($request->cart_item)) {
            foreach ($request->cart_item as $item) {
                CartItem::create([
                    'customer_id' => Auth::user()->customer_id,
                    'product_id' => $item['product_id'],
                    'cart_item_id' => Str::uuid(),
                    'cart_item_note' => $item['cart_item_note'] ?? null,
                    'cart_item_qty' => $item['cart_item_qty'],
                    'cart_item_price' => $item['cart_item_price'],
                ]);
            }
        }

        $cartItems = CartItem::with(['product' => function ($q) {
            $q->where('product_active', 1);
        }])->where('customer_id', Auth::user()->customer_id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $cartItems,
            ]
        );
    }
}
