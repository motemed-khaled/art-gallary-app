<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use Cache;

class CategoryController extends Controller
{


    public function index()
    {
        $category = Category::all();

        return CategoryResource::collection($category);
    }

    public function findById($id)
    {
        $category = Category::findOrFail($id);

        return response()->json([
            'data' => $category,
        ]);
    }


     public function create(CreateCategoryRequest $request)
     {
        $category = $request->createCategory();
        return new CategoryResource($category);
     }


    public function update(UpdateCategoryRequest $request)
    {
        $category =  $request->updateCategory();

        return new  CategoryResource($category);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'message' => '$category deleted successfully',
        ]);
    }

}
