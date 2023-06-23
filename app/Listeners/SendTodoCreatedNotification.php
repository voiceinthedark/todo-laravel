<?php

namespace App\Listeners;

use App\Events\TodoCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTodoCreatedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    protected $listeners = [
        TodoCreated::class
    ];


    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TodoCreated $event): void
    {
        // dd($event);
    }
}
