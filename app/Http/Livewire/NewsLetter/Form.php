<?php

namespace App\Http\Livewire\NewsLetter;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Actions\NewsLetter\EmailSubscriber;
use App\Mail\SubscriberMailable;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class Form extends Component
{

    public string $name  = '';
    public string $email = '';

    // validation rules
    protected $rules = [
        "name" => 'required',
        "email" => 'required|email|unique:subscribers'
    ];

    public function formSubmit()
    {
        $this->validate();
        $token = bcrypt($this->email);
        $data = array("name" => $this->name, "email" => $this->email, 'token' => $token);

        (new EmailSubscriber)($data);

        // save

        if (!Newsletter::isSubscribed($this->email)) {
            Newsletter::subscribe($this->email, ['NAME' => $this->name, 'TOKEN' => $token]);
        }
        Mail::to($this->email)->bcc("ashrafsayed19841111@gmail.com", 'ashraf sayed')->send(new SubscriberMailable($data));
        session()->flash('success', "تم الاشتراك في النشره البريديه");
        $this->reset();
    }
    public function render()
    {
        return view('livewire.news-letter.form');
    }
}
