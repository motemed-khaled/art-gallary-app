<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required|string|max:25',
            'last_name' => 'string|max:25',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ];
    }


    public function register(): User
    {
        DB::beginTransaction();
        try {
            // create cart
            $cart= Cart::create([]);
            // create user
            $user = User::create([
                'name' => trim("{$this->first_name} {$this->last_name}"),
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'cart_id'=>$cart->id,
                'phone'=>$this->phone,
                'adress'=>$this->adress,
            ]);


            // save data
            DB::commit();

            return $user->makeHidden('created_at', 'updated_at');
        } catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            throw $e;
        }
    }
}
