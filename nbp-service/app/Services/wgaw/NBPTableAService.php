<?php

declare(strict_types=1);

namespace App\Services\wgaw;

use App\Services\Contracts\NBPTableAInterface;
use App\Services\wgaw\class\CurlClass;

class NBPTableAService implements NBPTableAInterface
{
    private string $servicePassword = '1234';
    private string $nbpExchangeRatesTableAUrl = "http://api.nbp.pl/api/exchangerates/tables/A/";
    private int $httpResponseCode;

    public function __construct()
    {

    }

    public function testService(): bool
    {
        return true;
    }


    public function run(): void
    {
        $curl = new CurlClass($this->nbpExchangeRatesTableAUrl);
        dump($curl->getResponseBody());
    }
}
