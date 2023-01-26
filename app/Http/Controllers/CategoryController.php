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
        $order      = $request->input("order") ?? "index";
        $orderBy    = $request->input("order_by") ?? "desc";

        $categories = Category::orderBy($order, $orderBy)->get();

        return response()->json([
            "success" => true,
            "categories" => new CategoryCollection($categories),
        ]);
    }
}
