<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Register broadcasting routes.
     *
     * @return void
     *
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public function boot()
    {
        Broadcast::routes();

        include base_path('routes/channels.php');
    }
}
