<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function (callable $command) {
    $command->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
