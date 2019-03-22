<?php

namespace App\Listeners;

use App\Events\PostPublishedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\News;

class PostActionsListener
{

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostPublishedEvent  $event
     * @return void
     */
    public function handle(PostPublishedEvent $event)
    {
//        $event->post;
    }
}
