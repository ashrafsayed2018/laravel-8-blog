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
    public function render()
    {

        $categories = Category::all();
        $posts      = Post::all();
        return view('livewire.posts.show-post');
    }
}
