<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\wgaw\interfaces\CurlInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(CurlInterface $curl)
    {
        $data = $curl->getResponseBody(password: '1234');
        foreach ($data[0]->rates as $rate) {
            $row = [
                'id' => Str::uuid(),
                'name' => $rate->currency,
                'currency_code' => $rate->code,
                'exchange_rate' => $rate->mid,
                'exchange_rate_int' => $rate->mid * config('global.currency.converterToInt'),
            ];
            DB::table('currencies')->insert($row);
        }
    }
}
