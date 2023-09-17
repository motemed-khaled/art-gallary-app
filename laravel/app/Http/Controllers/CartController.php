<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Http\Requests\Cart\CreateCartRequest;
use App\Http\Requests\Cart\AddItemToCartRequest;
use App\Http\Requests\Cart\RemoveItemFromCartRequest;
use App\Http\Resources\CartResource;

class CartController extends Controller
{

    public function index()
    {
        $cart = Cart::all();

        return CartResource::collection($cart);
    }

    public function addItem(AddItemToCartRequest $request)
    {
        $request->addItemToCart();

        return response()->json([
            'message' => 'item added to cart successfully',
            'data' => null,
        ], 201);
    }

    public function removeItem(RemoveItemFromCartRequest $request)
    {
        $request->removeItemFromCart();

        return response()->json([
            'message' => 'item removed from cart successfully',
            'data' => null,
        ], 200);
    }

    public function show($id)
    {
        $cart = Cart::with([
            'products'
        ])->findOrFail($id);

        return new CartResource($cart);
    }

}
