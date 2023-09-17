<?php

namespace App\Http\Requests\Cart;

use App\Models\Cart;
use App\Models\ProductCart;
use Illuminate\Foundation\Http\FormRequest;

class AddItemToCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|integer|exists:products,id',
            'cart_id' => 'required|integer|exists:carts,id',
        ];
    }

    public function addItemToCart(): void
    {

        $cart = Cart::findOrFail($this->cart_id);
        $cart->products()->attach($this->product_id);

    }
}
