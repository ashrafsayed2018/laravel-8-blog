<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class)->withDefault("Admin User");
    }

    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, "post_tag")->withTimestamps();
    }

    // create scopt of category

    public function scopeCategory(Builder $query, string $category): Builder
    {
        return $query->where('category_id', $category);
    }



    // create scopt of featured posts
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where("featured", true);
    }

    // create scope for published at
    public function scopePublished(Builder $query): Builder
    {
        $today = new DateTime;
        return $query->whereNotNull("published_at")->where("published_at", "<=", $today);
    }

    // create scope for asc
    public function scopeRecentAsc(Builder $query): Builder
    {
        return $query->orderBy("title", "asc");
    }

    // create scope for desc
    public function scopeRecentDesc(Builder $query): Builder
    {
        return $query->orderBy("title", "desc");
    }
}
