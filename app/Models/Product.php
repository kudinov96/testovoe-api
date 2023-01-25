<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int              $id
 * @property string           $title
 * @property string           $description
 * @property int              $category_id
 *
 * @property Carbon           $created_at
 * @property Carbon           $updated_at
 */
class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $guarded = [
        "id",
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
