<?php

declare(strict_types=1);

namespace App\Services\Contracts;

/**
 * @uthor wojgaw
 */
interface NBPTableAInterface
{

    /**
     * TEST NBP API
     *
     * @return true if api works, flase otherwise
     */
    public function testService(): bool;

    /**
     * Run service according with the contract
     */
    public function run(): void;
}
