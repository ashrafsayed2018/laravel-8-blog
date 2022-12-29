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


    // search method

    public static function searchPost($search)
    {
        return empty($search) ? static::query() : static::query()->where('title', "like", "%" . $search . "%")->orWhere("body", "like", "%" . $search . "%");
    }

    public function render()
    {
        return view('livewire.posts.index', [
            'posts' => Post::searchPost($this->search)->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')->paginate($this->perPage)
        ]);
    }
}
