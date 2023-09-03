<?php
declare(strict_types=1);

namespace App\Listeners;

use App\Events\DefineLoginEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LastLoginUpdateListener
{
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
    public function handle(object $event): void
    {
        if ($event instanceof DefineLoginEvent) {
            $event->user->last_login_at = now();
            $event->user->save();
        }
    }
}

// namespace App\Listeners;

// use App\Events\DefineLoginEvent;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;

// class LastLoginUpdateListener
// {
//     /**
//      * Create the event listener.
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * Handle the event.
//      */
//     public function handle(object $event): void
//     {
//         if (isset($event->user) && $event instanceof DefineLoginEvent){
//             $event->user->last_login_at = now();
//             $event->user->save();
//         }
//     }
// }
