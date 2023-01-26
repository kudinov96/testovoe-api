<?php

namespace App\Action\Category;

use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class UpdateCategory
{
    public function handle(Category $item, CategoryUpdateRequest $request): Category
    {
        $item->index     = $request->index ?? $item->index;
        $item->parent_id = $request->parent_id ?? $item->parent_id;

        if ($request->index) {
            DB::table("categories")
                ->where("index", ">=", $request->index)
                ->increment("index");
        }

        $item->save();

        return $item;
    }
}
