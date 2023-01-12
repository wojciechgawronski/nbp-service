<?php

declare(strict_types=1);

namespace App\Services\wgaw;

use App\Services\Contracts\NBPTableAInterface;


class NBPTableAService implements NBPTableAInterface
{

    public function testService(): bool
    {
        return true;
    }


    public function run(): void
    {
        echo __CLASS__ . ": test run method...";
    }
}
