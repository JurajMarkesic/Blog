<?php

namespace App\Listeners;

use App\Events\PageViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdatePageViews
{
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
     * @param  PageViewed  $event
     * @return void
     */
    public function handle(PageViewed $event)
    {
        $id = $event->post->id;
        if(session()->has('post_' . $id)) {

        }else {
            $event->post->views++;

            $event->post->update();

            session(['post_' . $id => $event->post->views]);
        }



    }
}
