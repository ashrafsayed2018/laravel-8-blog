<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    public $search = '';
    public $orderBy = "id";
    public $orderAsc = true;
    public $perPage = 10;


    // listener when the delete post

    protected $listeners = ['refreshPostsWhenPostDelete' => '$refresh'];

    public function render()
    {
        return view('livewire.posts.index', [
            'posts' => Post::where('id', "like", "%" . $this->search . "%")->orWhere('title', "like", "%" . $this->search . "%")->orWhere("body", "like", "%" . $this->search . "%")->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')->paginate($this->perPage)
        ]);
    }
}
