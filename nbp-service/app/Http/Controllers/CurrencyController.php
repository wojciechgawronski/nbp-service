<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\Contracts\NBPTableAInterface;

class CurrencyController extends Controller
{

    public function __construct(
        private NBPTableAInterface $NBPService,
    ) {

    }

    public function index()
    {
        $currencies = Currency::all();
        return view('currencies.index', compact('currencies'));
    }

    public function deleteAll()
    {
        Currency::truncate();
        $currencies = Currency::all();
        return redirect()->route('currencies.index')->with('success', 'Delete all data');
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

    public function runWgawService()
    {
        $this->wgService();
        return redirect()->route('currencies.index')->with('success', 'Dodano / auktualniono dane');
    }

    public function wgService()
    {
        if ($this->NBPService->testService()) {
            $this->NBPService->run();
        }
        dd('Done!');
    }
}
