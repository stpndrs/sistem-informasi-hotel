<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KamarController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->is_operator) {
            $available = [];
            $selected = [];
            if ($request->checkin && $request->checkout) {
                $available = Transaction::where('checkin_date', $request->checkin)
                    ->where('checkout_date', $request->checkout)
                    ->where('status', '0')
                    ->get();
                $selected = Transaction::where('checkin_date', $request->checkin)
                    ->where('checkout_date', $request->checkout)
                    ->where('status', '1')
                    ->get();
            }

            return view('operator.kamar.kamar', compact('available', 'selected'));
        } else {
            $data = Kamar::all();

            return view('operator.kamar.kamar', compact('data'));
        }
    }

    public function show($kamar)
    {
        $kamar = Kamar::find($kamar);

        return response()->json($kamar);
    }

    public function create()
    {
        return view('operator.kamar.create');
    }

    public function store(Request $request) {
        Kamar::create($request->all());

        return redirect()->route('admin.kamar.index')->with('alert', ['message' => 'Berhasil menambah kamar', 'status' => 'success']);
    }

    public function edit(Kamar $kamar)
    {
        return view('operator.kamar.edit', compact('kamar'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $kamar->update($request->all());

        return redirect()->route('admin.kamar.index')->with('alert', ['message' => 'Berhasil merubah kamar', 'status' => 'success']);
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();

        return redirect()->route('admin.kamar.index')->with('alert', ['message' => 'Berhasil menghapus kamar', 'status' => 'success']);
    }
}
