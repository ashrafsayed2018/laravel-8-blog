<?php

namespace App\Http\Livewire\Buttons;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Delete extends Component
{

    public Post $post;
    public bool $confirmDeletion = false;

    public function confirmPostDeletion()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-post');
        $this->confirmDeletion = true;
    }

    public function deletePost()
    {
        File::delete(public_path("image/blog/" . $this->post->cover_image));
        $this->post->delete();
        return redirect()->route('posts.index')->with("sucess", "تم حذف المقال بنجاح");
    }
    public function render()
    {
        return view('livewire.buttons.delete');
    }
}
