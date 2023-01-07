<?php

namespace App\Actions\NewsLetter;

use App\Models\Subscriber;

class EmailSubscriber
{
    public function __invoke(array $formData)
    {

        // get or create subscriber email
        $this->getOrCreateSubscriberEmail($formData);
    }
    private function getOrCreateSubscriberEmail(array $data): Subscriber
    {

        return Subscriber::firstOrCreate($data);
    }
}
