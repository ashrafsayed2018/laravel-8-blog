<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $guarded = [];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }


    public function subCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // get the subcategory parent name
    public function subcategoryParent($category)
    {
        $child_id = Category::where("parent_id", $category->parent_id)->first();

        $parent_cat_name = Category::where("id", $child_id->parent_id)->first()->name;

        return $parent_cat_name;
    }
}
