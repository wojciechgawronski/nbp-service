<?php

declare(strict_types=1);

namespace App\Services\wgaw\class;

use App\Services\wgaw\interfaces\CurlInterface;
use stdClass;

class CurlClass implements CurlInterface
{
    private int $httpResponseCode;
    private string $curlResponse;

    public function __construct(
        private string $url,
    )
    {
       $this->curlResponse = $this->_curl();
    }

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

    private function _curl(): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        $response = curl_exec($ch);
        $httpResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $this->httpResponseCode = $httpResponseCode;

        return $response;
    }
}


