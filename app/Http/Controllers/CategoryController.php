<?php

namespace App\Http\Controllers;

use App\Action\Category\UpdateCategory;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
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

    public function update(int $id, CategoryUpdateRequest $request, UpdateCategory $update): JsonResponse
    {
        $category = Category::findOrFail($id);

        $update->handle($category, $request);

        return response()->json([
            "success"  => true,
        ]);
    }
}
