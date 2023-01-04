<?php

namespace App\Http\Livewire\Buttons;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Delete extends Component
{

    public Post $post;

    protected $listeners = ['deleteConfirmed' => "deletePost"];

    public function deleteConfirmation()
    {


        $this->dispatchBrowserEvent("show-delete-confirmation");
    }

    public function deletePost()
    {
        $oldImageDestination = "storage/images/" . $this->post->cover_image;
        if (File::exists($oldImageDestination)) {
            File::delete($oldImageDestination);
        }
        $this->post->delete();

        $this->dispatchBrowserEvent("postDeleted");

        $this->emit("refreshPostsWhenPostDelete");
    }



    public function render()
    {
        return view('livewire.buttons.delete');
    }
}
