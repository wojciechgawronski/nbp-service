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
       $this->curlResponse = $this->_curl($url);
       $this->getResponseHeaders();
    }

    public function getResponseHeaders(): object
    {
        $headers = new stdClass();
        $headerText = substr($this->curlResponse, 0, strpos($this->curlResponse, "\r\n\r\n"));
        foreach (explode("\r\n", $headerText) as $i => $line) {
            if ($i == 0) {
                $headers->http_code = $line;
            } else {
                list($key, $val) = explode(':', $line);
                $headers->$key = $val;
            }
        }
        return $headers;

    }

    public function getResponseBody(): array
    {
        $responseStr = $this->curlResponse;
        $start = strpos($responseStr, "\r\n\r\n") +4;
        $bodyStr = substr($responseStr, $start, strlen($responseStr) - $start);
        $body = json_decode($bodyStr);

        return $body;
    }

    public function test(): bool
    {
        if ($this->httpResponseCode == 200) {
            return true;
        }
        return false;
    }

    private function _curl(string $url): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        $response = curl_exec($ch);
        $httpResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $this->httpResponseCode = $httpResponseCode;

        return $response;
    }
}


