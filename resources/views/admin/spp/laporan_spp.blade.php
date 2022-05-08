@extends('layouts.app',['title'=> $title])


@push('styles')

@endpush

@push('scripts')
<script src="{{ asset('assets/jquery-auto.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/jquery-ui.css') }}">
<script src="{{ asset('assets/jquery-ui.js') }}"></script>


{{-- Java  --}}

<script>
    $('.pencarian').autocomplete({
        source: function (request, response) {

            $.ajax({
                url: "{{ route('laporan.cari-siswa') }}",
                type: "get",
                dataType: "json",
                data: {
                    // _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data, angka) {

                    response(data);

                }
            });
        },
        select: function (event, ui) {

            $('.pencarian').val(ui.item.value);
            $('.nama').val(ui.item.label);


        }
    });

</script>

@endpush


@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h2>Laporan SPP</h2>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            Pencarian Berdasarkan Tanggal,Bulan,Tahun
                        </div>
                        <div class="card-body">
                            <form action="{{ route('cari.spp') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Dari</label>
                                            <input class="form-control" type="date" name="from">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Sampai</label>
                                            <input class="form-control" type="date" name="to">
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Cetak</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            Pencarian berdasarkan NIK
                        </div>
                        <div class="card-body">
                            <form action="{{ route('cari.spp.nik') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">NIK</label>
                                            <input type="text" id="pencarian" name="pencarian"
                                                class="form-control pencarian">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" class="nama form-control" id="nama" readonly>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Cetak</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
