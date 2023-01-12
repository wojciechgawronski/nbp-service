<?php

declare(strict_types=1);

namespace App\Services\wgaw\class;

use App\Services\wgaw\interfaces\CurlInterface;
use stdClass;

class CurlClass implements CurlInterface
{
    public function getResponseHeaders(): object
    {
        $o = new stdClass();
        return $o;

    }

    public function getResponseBody(): object
    {
        $o = new stdClass();
        return $o;
    }

    public function test(): bool
    {
        return false;
    }
}


