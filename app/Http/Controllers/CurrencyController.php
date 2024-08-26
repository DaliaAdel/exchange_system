<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    //
    public function index() {
        $currencies = config('currenies');
        // dd($currencies);
        return view('Currency.index', compact('currencies'));
    }

    public function create() {
        return view('Currency.create');
    }
    
    public function store(Request $request) {
        $data = $request->validate([
            'currency' => 'required|string',
            'rate' => 'required|numeric',
        ]);
    
        $currencies = config('currencies');
        $currencies[$data['currency']] = $data['rate'];
    
        file_put_contents(config_path('currenies.php'), '<?php return ' . var_export($currencies, true) . ';');
    
        // dd($currencies);
        return view('Currency.index', compact('currencies'));
    }

    public function edit($key) {
        // dd($key);
        $rate = config("currenies.$key");
        // dd($rate);
        return view('Currency.edit', compact('key', 'rate'));
    }
    
    public function update(Request $request, $key) {
        $data = $request->validate([
            'rate' => 'required|numeric',
            // 'key' => 'required|string',
        ]);
    
        $currencies = config('currenies');
        $currencies[$key] = $data['rate'];
    
        file_put_contents(config_path('currenies.php'), '<?php return ' . var_export($currencies, true) . ';');
    
        return view('Currency.index', compact('currencies'));
    }
    public function destroy($currency) {
        $currencies = config('currenies');
        unset($currencies[$currency]);
        file_put_contents(config_path('currencies.php'), '<?php return ' . var_export($currencies, true) . ';');
        return view('Currency.index', compact('currencies'));
    }

}
