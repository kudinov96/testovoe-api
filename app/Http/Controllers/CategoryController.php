<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\Category\CategoryCollection;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function index(CategoryRequest $request): JsonResponse
    {
        $orderBy    = $request->input("order_by") ?? "index";
        $categories = Category::orderBy($orderBy)->get();

        return response()->json([
            "success" => true,
            "categories" => new CategoryCollection($categories),
        ]);
    }
}
