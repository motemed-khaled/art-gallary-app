<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:50|unique:categories,name,' . $this->id,
        ];
    }

    public function updateCategory(): Category
    {

        $category = Category::find($this->id);

        $category->update([
            'name' => $this->name,
        ]);

        return $category;
    }
}
