<?php

namespace App\Http\Livewire\NewsLetter;

use Livewire\Component;

class Form extends Component
{

    public string $name  = '';
    public string $email = '';

    public function formSubmit()
    {
        dd("hello");
    }
    public function render()
    {
        return view('livewire.news-letter.form');
    }
}
