<?php

namespace App\Http\Requests\Order;

use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Foundation\Http\FormRequest;

class AddProductToOrderRequest extends FormRequest
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
            'order_id' => 'required|integer|exists:orders,id'
        ];
    }

    public function addStudentToCourse(): void
    {
        $order = Order::findOrFail($this->order_id);
        $order->products()->attach($this->product_id);

    }
}
