<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index()
    {
        $kamar = Kamar::where('status', '1')->get();

        return view('operator.checkin.create', compact('kamar'));
    }

    public function store(Request $request)
    {
        Transaction::create($request->all());
        $kamar = Kamar::find($request->kamar_id)->update(['status' => '0']);

        return redirect()->route('operator.kamar.index')->with('alert', ['message' => 'Berhasil Checkin', 'status' => 'success']);
    }
}
