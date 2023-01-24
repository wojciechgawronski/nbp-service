<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Currency;
use App\Services\Contracts\NBPTableAInterface;
use Illuminate\Console\Command;

class NBPServiceCommand extends Command
{
    private string $servicePassword = '123';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nbp-service {--name=} {--password=} {--reset}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'NBP Service --name --password --reset';

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

        if (isset($reset)) {
            $password = $this->ask('service password: ');
            if ($password === $this->servicePassword) {
                Currency::truncate();
                echo "Reset database\n";
                return Command::SUCCESS;
            } else {
                echo "Wrong password! \n";
                return Command::SUCCESS;
            }
        }

        if (!$name) {
            $name = $this->ask('service name: ');
        }
        if (!$password) {
            $password = $this->ask('service password: ');
        }

        if ($password = $this->servicePassword && $name == 'wgaw') {
            $service->run();
            echo "Well done! \n";
        } else {
            echo "No credentials";
        }

        return Command::SUCCESS;
    }
}
