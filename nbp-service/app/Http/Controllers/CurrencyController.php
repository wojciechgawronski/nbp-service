<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Services\Contracts\NBPTableAInterface;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{

    public function __construct(
        private NBPTableAInterface $NBPService,
    ) {

    }

    public function index()
    {
        $currencies = Currency::all();
        dd($currencies);
    }

    public function testAdd()
    {
        $currency = [
            'id' => Str::uuid(),
            'name' => 'test name',
            'currency_code' => Str::random(3),
            'exchange_rate' => 1.001,
            'exchange_rate_int' => 1001,
        ];

        dd(Currency::insert($currency));

    }

    public function wgService()
    {
        if ($this->NBPService->testService()) {
            $this->NBPService->run();
        }
    }
}
