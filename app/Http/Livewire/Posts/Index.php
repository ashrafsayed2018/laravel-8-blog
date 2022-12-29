<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    public $search = '';
    public $orderedBy = "id";
    public $orderAsc = true;
    public $perPage = 10;


    public function render()
    {
        return view('livewire.posts.index');
    }
}
