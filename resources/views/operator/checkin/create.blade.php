@extends('operator.template')

@section('content')
    <div class="container p-5">
        <h3>FORM PEMESANAN</h3>
        <form action="{{ route('operator.checkin.store') }}" method="post">
            @csrf

            <div class="form-group mb-3 row">
                <div class="col-lg-3">
                    <label for="nik">NIK</label>
                </div>
                <div class="col-lg">
                    <input required type="text" name="nik" id="nik" class="form-control">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-lg-3">
                    <label for="nama">Nama Pemesan</label>
                </div>
                <div class="col-lg">
                    <input required type="text" name="nama" id="nama" class="form-control">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-lg-3">
                    <label for="email">Email</label>
                </div>
                <div class="col-lg">
                    <input required type="email" name="email" id="email" class="form-control">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-lg-3">
                    <label for="nohp">No HP</label>
                </div>
                <div class="col-lg">
                    <input required type="nohp" name="nohp" id="nohp" class="form-control">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-lg-3">
                    <label for="kamar_id">Nomor Kamar</label>
                </div>
                <div class="col-lg">
                    <select required name="kamar_id" id="kamar_id" class="form-control">
                        <option value="">Pilih Nomor Kamar</option>
                        @foreach ($kamar as $item)
                            <option value="{{ $item->id }}">{{ $item->nomor }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-lg-3">
                    <label for="tipe">Nomor Kamar</label>
                </div>
                <div class="col-lg">
                    <input type="text" name="tipe" id="tipe" disabled class="form-control">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-lg-3">
                    <label for="checkin_date">Check In</label>
                </div>
                <div class="col-lg">
                    <input readonly type="date" name="checkin_date" id="checkin_date" class="form-control" value="{{ date('Y-m-d') }}">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-lg-3">
                    <label for="checkout_date">Check Out</label>
                </div>
                <div class="col-lg">
                    <input required type="date" name="checkout_date" id="checkout_date" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Check In</button>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $('#kamar_id').change(function() {
            var val = this.value
            const tipe = $('#tipe')

            $.ajax({
                url: "{{ url('admin/kamar') }}/" + val,
                method: 'GET',
                success: function(data) {
                    tipe.val(data.tipe)
                }
            })
        })
    </script>
@endsection
