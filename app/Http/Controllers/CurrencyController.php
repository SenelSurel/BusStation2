<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * @throws ConnectionException
     */
    public function getExchangeRates()
    {
        $response = Http::get('https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/try.json');

        if ($response->successful()) {
            $data = $response->json();
            return response()->json([
                'usd' => $data['try']['usd'] ?? null,
                'eur' => $data['try']['eur'] ?? null,
                'gbp' => $data['try']['gbp'] ?? null,
            ]);
        } else {
            return response()->json(['error' => 'Döviz kuru bilgisi alınamadı'], 500);
        }
    }
}
