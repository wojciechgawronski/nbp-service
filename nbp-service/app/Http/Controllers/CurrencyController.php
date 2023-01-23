<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\Contracts\NBPTableAInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class CurrencyController extends Controller
{
    public function __construct(
        private NBPTableAInterface $NBPService,
    ) {
    }

    public function index(): View
    {
        $currencies = Currency::all();
        return view('currencies.index', compact('currencies'));
    }

    public function indexApi(): JsonResponse
    {
        $currencies = CurrencyResource::collection(Currency::all());
        return response()->json($currencies, 200);
    }

    public function deleteAll(): RedirectResponse
    {
        Currency::truncate();
        $currencies = Currency::all();
        return redirect()->route('currencies.index')->with('success', 'Delete all data');
    }

    public function testAdd(): void
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

    public function runWebWgawService(): RedirectResponse
    {
        $this->wgService();
        return redirect()->route('currencies.index')->with('success', 'Dodano / auktualniono dane');
    }

    public function wgService(): void
    {
        if ($this->NBPService->testService()) {
            $this->NBPService->run();
        }
    }
}
