<?php

namespace App\Listeners;

use Illuminate\Support\Facades\DB;
use App\Events\SuccesLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveLoginData
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
     * @param  SuccesLogin  $event
     * @return void
     */
    public function handle(SuccesLogin $event)
    {
        date_default_timezone_set('Europe/Warsaw');
        DB::table('users_succesfull_logins')->insert([
            'user_id' => $event->data,
            'login_date' => date('Y-m-d', strtotime('now')),
            'login_time' => date('H:i:s', strtotime('now'))
        ]);
    }
}
