<?php

namespace App\Services;

// import mailchimp client 
use \MailchimpMarketing\ApiClient;

class Newsletter
{
    // promoted constructor args
    public function __construct(protected ApiClient $client)
    {
    }

    public function subscribe(string $email, string $list = null)
    {
        /* ??= is a null safe assignment */
        $list ??= config('services.mailchimp.lists.subscribers');


        // return our mailchimp client, to the lists resource we will add a client
        return $this->client->lists->addListMember($list, [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    }
}


/* Class members declared public can be accessed everywhere. Members declared protected can be accessed
 only within the class itself and by inheriting and parent classes. Members declared as private may only 
 be accessed by the class that defines the member. */