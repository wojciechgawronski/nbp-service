<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\Contracts\NBPTableAInterface;
use Illuminate\Console\Command;

class RunServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run-service {--name=} {--password=} {--reset}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run NBP Service';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(NBPTableAInterface $service)
    {
        $name = $this->option('name');
        $password = $this->option('password');
        $reset = $this->option('reset');

        if (!$name) {
            $name = $this->ask('service name: ');
        }
        if (!$password) {
            $password = $this->ask('service password: ');
        }

        if ($password = '123' && $name == 'wgaw') {
            $service->run();
            echo "Well done! \n";
        } else {
            echo "No credentials";
        }

        return Command::SUCCESS;
    }
}
