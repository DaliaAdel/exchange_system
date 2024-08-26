<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAmountRequest;
use App\Http\Requests\UpdateAmountRequest;

class AmountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amounts = Amount::all();
        $currencies = config('currenies');

        foreach ($amounts as $amount) {
            $amount->exchange_value = $amount->amount * $currencies[$amount->currency];
        }

        // dd( $amounts);
        return view('Amount.index', compact('amounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currencies = array_keys(config('currenies'));
    return view('Amount.create', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string',
        ]);
    
        Amount::create($data);
    
        return redirect()->route('amounts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Amount $amount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Amount $amount) {
        $currencies = array_keys(config('currenies'));
        return view('Amount.edit', compact('amount', 'currencies'));
    }
    
    public function update(Request $request, Amount $amount) {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string',
        ]);
    
        // dd($amount);
        $amount->update($data);
    
        return redirect()->route('amounts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amount $amount)
    {
        $amount->delete();
        $amounts = Amount::all();
        $currencies = config('currenies');

        foreach ($amounts as $amount) {
            $amount->exchange_value = $amount->amount * $currencies[$amount->currency];
        }
        return view('Amount.index', compact('amounts'));
    }
}
