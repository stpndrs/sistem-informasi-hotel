@extends('operator.template')

@section('content')
    <div class="container p-5">
        <div class="card mb-5">
            <div class="card-header">
                <h3 class="card-title">Cari Data Kamar</h3>
            </div>
            <form action="{{ route('operator.checkout.index') }}" method="get">
                @csrf
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-3">Nomor Kamar</div>
                        <div class="col-lg"><input type="text" name="nomor" id="nomor" class="form-control"
                                required value="{{ $_GET['nomor'] ?? '' }}"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-lg">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nomor Kamar</th>
                            <th>Lantai</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Check In</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction as $item)
                            <tr>
                                <td>{{ $item->kamar->nomor }}</td>
                                <td>{{ $item->kamar->lantai }}</td>
                                <td>{{ $item->kamar->harga }}</td>
                                <td>{{ $item->kamar->deskripsi }}</td>
                                <td>{{ $item->checkin_date }}</td>
                                <td>
                                    <form action="{{ route('operator.checkout.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type submit class="btn btn-primary">Checkout</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
