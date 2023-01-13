<?php

declare(strict_types=1);

namespace App\Services\wgaw;

use App\Models\Currency;
use Illuminate\Support\Str;
use App\Services\wgaw\class\CurlClass;
use App\Services\Contracts\NBPTableAInterface;
use App\Services\wgaw\interfaces\CurlInterface;

class NBPTableAService implements NBPTableAInterface
{
    private string $servicePassword = '1234';
    private string $nbpExchangeRatesTableAUrl = "http://api.nbp.pl/api/exchangerates/tables/A/";
    private int $httpResponseCode;

    public function __construct(CurlInterface $curl)
    { }

    public function testService(): bool
    {
        return true;
    }


    public function run(): void
    {
        $currencies = Currency::all();
        $curl = new CurlClass($this->nbpExchangeRatesTableAUrl);
        $rates = $curl->getResponseBody()[0]->rates;

        if ($currencies->isEmpty()) {
            $this->_insertRates($rates);
        } else {
            $this->_insertOrUpdateRates($currencies, $rates);
        }
    }

    private function _insertRates(array $rates)
    {
        $ratesToInsert = [];
        foreach ($rates as $rate) {
            $ratesToInsert[] = [
                'id' => Str::uuid(),
                'name' => $rate->currency,
                'currency_code' => $rate->code,
                'exchange_rate' => $rate->mid,
                'exchange_rate_int' => $rate->mid * config('global.currency.converterToInt'),
            ];
        }
        Currency::insert($ratesToInsert);
    }

    private function _insertOrUpdateRates($currencies, array $rates)
    {
        // update
        foreach ($currencies as $currency) {
            foreach ($rates as $k =>  $rate) {
                if ($rate->code === $currency->currency_code){
                    if ($currency->exchange_rate !== $rate->mid){
                        $currency->exchange_rate = $rate->mid;
                        $currency->save();
                    }
                    unset($rates[$k]);
                }
            }
        }

        // create
        $this->_insertRates($rates);
    }
}
