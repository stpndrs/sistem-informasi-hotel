@extends('operator.template')

@section('content')
    <div class="container p-5">
        <h3>Edit User Hotel</h3>
        <form action="{{ route('admin.user.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control mb-3" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control mb-3" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control mb-3" value="{{ $user->username }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" class="form-control mb-3" placeholder="Masukkan password baru untuk mengganti passawaord">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control mb-3">
                    <option value="">Pilih Level</option>
                    <option value="admin" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                    <option value="operator" {{ $user->is_operator ? 'selected' : '' }}>Operator</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
