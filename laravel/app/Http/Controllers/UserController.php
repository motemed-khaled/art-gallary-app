<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }
    public function index()
    {
        $user = User::all();

        return UserResource::collection($user);
    }

    public function createUser(CreateUserRequest $request)
    {
       $user = $request->createUser();
       return new UserResource($user);
    }

    public function findById($id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'data' =>$user ,
        ]);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => '$user deleted successfully',
        ]);
    }
}
