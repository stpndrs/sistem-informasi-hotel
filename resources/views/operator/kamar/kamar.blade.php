@extends('operator.template')

@section('content')
    @if (Auth::user()->is_operator)
        <div class="container p-5">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="card-title">Informasi Reservasi</h3>
                </div>
                <form action="{{ route('operator.kamar.index') }}" method="get">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-3">Check In</div>
                            <div class="col-lg"><input type="date" name="checkin" id="checkin" class="form-control"
                                    value="{{ $_GET['checkin'] ?? '' }}" required></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">Check Out</div>
                            <div class="col-lg"><input type="date" name="checkout" id="checkout" class="form-control"
                                    value="{{ $_GET['checkout'] ?? '' }}" required></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-lg">
                    <h3>List available rooms</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nomor Kamar</th>
                                <th>Lantai</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($available as $item)
                                <tr>
                                    <td>{{ $item->kamar->nomor }}</td>
                                    <td>{{ $item->kamar->lantai }}</td>
                                    <td>{{ $item->kamar->harga }}</td>
                                    <td>{{ $item->kamar->deskripsi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg">
                    <h3>List selected rooms</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nomor Kamar</th>
                                <th>Lantai</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($selected as $item)
                                <tr>
                                    <td>{{ $item->kamar->nomor }}</td>
                                    <td>{{ $item->kamar->lantai }}</td>
                                    <td>{{ $item->kamar->harga }}</td>
                                    <td>{{ $item->kamar->deskripsi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->is_admin)
        <div class="container p-5">
            <a href="{{ route('admin.kamar.create') }}" class="btn btn-primary">Tambah</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Kamar</th>
                        <th>Lantai</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->lantai }}</td>
                            <td>{{ $item->tipe }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->status ? 'kosong' : 'isi' }}</td>
                            <td>
                                <a href="{{ route('admin.kamar.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('admin.kamar.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
