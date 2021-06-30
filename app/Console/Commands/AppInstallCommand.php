<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppInstallCommand extends Command
{
    protected $signature = 'app:install';

    /**
     *
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public function handle()
    {
        $env = env('APP_ENV', 'local') === 'local' ? 'dev' : 'prod';

        $this->getOutput()->title('Executing migrate --seed  --force');
        $this->call('migrate', [
            '--seed' => true,
            '--force' => true,
        ]);

        $this->getOutput()->title('Executing yarn && yarn run ' . $env);
        echo shell_exec('yarn && yarn run ' . $env);

        $this->getOutput()->newLine();
        $this->getOutput()->success('Installation Complete!');
    }
}
