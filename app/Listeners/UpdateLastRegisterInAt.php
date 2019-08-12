<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Register;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\carbon ;

class UpdateLastRegisterInAt
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
     * @param  Register  $event
     * @return void
     */
    public function handle(Register $event)
    {
         $event->user->last_sign_in_at = Carbon::now() ;
        $event->user->save(); 
    }
}
