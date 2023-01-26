<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int              $id
 * @property string           $title
 * @property int              $parent_id
 * @property int              $index
 *
 * @property Carbon           $created_at
 * @property Carbon           $updated_at
 */
class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $guarded = [
        "id",
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, "parent_id");
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany(self::class, "parent_id");
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function scopeWithoutParent(Builder $builder): Builder
    {
        return $builder->where("parent_id", null);
    }
}
