<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ShowPost extends Component
{

    use WithPagination;
    public $category;
    public $sortBy = 'recentdesc';
    protected $queryString = [
        'category' => ['except' => ''],
        'sortBy'   => ['except' => 'recentdesc']
    ];

    public function categoryExists($category): bool
    {
        return Category::where("id", $category)->exists();
    }

    // method to check if valid sort

    public function validSort($sort): bool
    {
        return in_array($sort, [
            'recentAsc',
            "recentDesc"
        ]);
    }

    // method update sort by property
    public function sortBy($sort): void
    {
        $this->sortBy = $this->validSort($sort) ? $sort : 'recentDesc';
    }

    // toggle category function

    public function toggleCategory($category): void
    {

        $this->category = $this->category != $category && $this->categoryExists($category) ? $category : null;
    }
    public function render()
    {

        $categories = Category::all();
        $posts      = Post::published();

        if ($this->category) {
            $posts->category($this->category);
        }
        $posts->{$this->sortBy}();



        return view('livewire.posts.show-post', [
            'categories'       => $categories,
            'posts'            => $posts->paginate(1),
            'selectedCategory' => $this->category,
            "selectedSortedBy" => $this->sortBy
        ]);
    }
}
