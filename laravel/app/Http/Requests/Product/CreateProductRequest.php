<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'descreption' => 'required|string',
            'price' => 'required|between:0,99.99|max:50',
            'stock' => 'required|integer|max:50',
            'image' => 'string',
            'status' => 'boolean',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }

    public function createProduct(): Product
    {
        return Product::create([
            'name' => $this->name,
            'descreption' => $this->descreption,
            'price' => $this->price,
            'stock' => $this->stock,
            'image' => $this->image,
            'status' => $this->status,
            'category_id' => $this->category_id,
        ]);
    }
}


