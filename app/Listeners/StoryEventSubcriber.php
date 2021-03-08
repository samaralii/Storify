<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;

class StoryEventSubcriber
{


    public function handleStoryCreated($event)
    {
        Log::info('Inside Subscriber. A Story with title' . $event->title . ' was added.');
    }

    public function handleStoryEdited($event)
    {
        Log::info('Inside Subscriber. A Story with title' . $event->title . ' was edited.');
    }


    // public function subscribe($events)
    // {
    //     $events->listen(
    //         'App\Events\StoryCreated',
    //         [\App\Listeners\StoryEventSubcriber::class, 'handleStoryCreated'],
    //         // 'App\Listeners\StoryEventSubscriber@handleStoryCreated'
    //     );

    //     $events->listen(
    //         'App\Events\StoryEdited',
    //         [\App\Listeners\StoryEventSubcriber::class, 'handleStoryEdited'],
    //         // 'App\Listeners\StoryEventSubscriber@handleStoryEdited'
    //     );
    // }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\StoryCreated',
            [StoryEventSubcriber::class, 'handleStoryCreated']
        );

        $events->listen(
            'App\Events\StoryEdited',
            [StoryEventSubcriber::class, 'handleStoryEdited']
        );
    }
}
