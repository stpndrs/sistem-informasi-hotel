<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::all();

        return view('operator.user.user', compact('data'));
    }

    public function show($user)
    {
        $user = User::find($user);

        return response()->json($user);
    }

    public function create()
    {
        return view('operator.user.create');
    }

    public function store(Request $request)
    {
        $request['is_admin'] = $request->level == 'admin' ? true : false;
        $request['is_operator'] = $request->level == 'operator' ? true : false;
        $request['password'] = bcrypt($request->password);
        User::create($request->all());

        return redirect()->route('admin.user.index')->with('alert', ['message' => 'Berhasil menambah user', 'status' => 'success']);
    }

    public function edit(User $user)
    {
        return view('operator.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request['is_admin'] = $request->level == 'admin' ? true : false;
        $request['is_operator'] = $request->level == 'operator' ? true : false;
        $request['password'] = $request->password ? bcrypt($request->password) : $user->password;
        $user->update($request->all());

        return redirect()->route('admin.user.index')->with('alert', ['message' => 'Berhasil merubah user', 'status' => 'success']);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.index')->with('alert', ['message' => 'Berhasil menghapus user', 'status' => 'success']);
    }
}
