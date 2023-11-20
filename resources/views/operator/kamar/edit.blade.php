@extends('operator.template')

@section('content')
    <div class="container p-5">
        <h3>Edit Kamar Hotel</h3>
        <form action="{{ route('admin.kamar.update', $kamar->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nomor">Nomor Kamar</label>
                <input type="number" name="nomor" id="nomor" class="form-control mb-3" value="{{ $kamar->nomor }}">
            </div>
            <div class="form-group">
                <label for="lantai">Lantai</label>
                <input type="number" name="lantai" id="lantai" class="form-control mb-3" value="{{ $kamar->lantai }}">
            </div>
            <div class="form-group">
                <label for="tipe">Tipe</label>
                <input type="text" name="tipe" id="tipe" class="form-control mb-3" value="{{ $kamar->tipe }}">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control mb-3" value="{{ $kamar->harga }}">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" class="form-control mb-3" value="{{ $kamar->deskripsi }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
