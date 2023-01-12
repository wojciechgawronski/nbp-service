<?php

declare(strict_types=1);

namespace App\Services\wgaw\interfaces;

interface CurlInterface
{
    public function getResponseHeaders(): object;

    public function getResponseBody(): array;

    public function test(): bool;
}

