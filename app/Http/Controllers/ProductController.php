<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(ProductRequest $request): JsonResponse
    {
        $order      = $request->input("order") ?? "created_at";
        $orderBy    = $request->input("order_by") ?? "desc";
        $search     = $request->input("search") ?? null;

        $products   = Product::query();

        if ($search) {
            $products = $products
                ->whereRaw('LOWER("title") LIKE ? ',['%' . mb_strtolower($search) . '%'])
                ->orWhereRaw('LOWER("description") LIKE ? ',['%' . mb_strtolower($search) . '%']);
        }

        $products = $products->orderBy($order, $orderBy)->get();

        return response()->json([
            "success" => true,
            "products" => new ProductCollection($products),
        ]);
    }
}
