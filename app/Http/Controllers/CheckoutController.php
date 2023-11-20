<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $transaction = [];

        if ($request->nomor) $transaction = Transaction::where('nomor', $request->nomor)->join('kamars', 'transactions.kamar_id', 'kamars.id')->select('transactions.*')->get();
        else $transaction = Transaction::where('status', '1');

        return view('operator.checkout.checkout', compact('transaction'));
    }

    public function store(Request $request)
    {
        $find = Transaction::find($request->id);
        $kamar = Kamar::find($find->kamar_id)->update(['status' => '1']);
        $find->update(['status' => '0']);

        return redirect()->route('operator.checkout.index')->with('alert', ['message' => 'Berhasil Checkout', 'status' => 'success']);
    }
}
