@extends('layouts.app', ['title' => $title])

@push('styles')
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">

<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
<script src="{{ asset('assets/jquery-auto.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/datatable/css/jquery.dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/datatable/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/datatable/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/jquery-ui.css') }}">

@endpush

@push('scripts')
<script src="{{ asset('assets/datatable/js/jquery.dataTables.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
<script src="{{ asset('assets/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/jquery-ui.js') }}"></script>


<script>
    $('.nama').hide();
    $(document).ready(function () {
        let pencarian = $('.pencarian').val();

        $('.pencarian').keyup(function () {
            if (pencarian == '') {
                $('.nama').hide();
            }
        })
    })

    $('#myTable').DataTable({
        responsive: true
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');



    $('.pencarian').autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "{{ route('cari-siswa') }}",
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
            $('.nama').show(200);
            $('#nama').val(ui.item.label);
        }
    });






</script>
@endpush

@section('content')
{{-- <div id="pembayaran-spp" endpoint="{{ route('pencarian') }}" title="{{ $title }}"></div> --}}
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Pembayaran SPP</h2>
            @if (session('notfound'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h3 class="text-center">{{ session('notfound') }}</h3>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h3 class="text-center">{{ session('success') }}</h3>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{ route('pencarian') }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pencarian">Masukkan Nomor Induk Siswa</label>
                            <input type="text" id="pencarian" class="form-control pencarian" name="pencarian">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pencarian" class="nama">Nama Siswa</label>
                            <input type="text" readonly id="nama" class="form-control nama">
                        </div>
                    </div>
                </div>
                <button class=" btn btn-info text-white" type="submit">Cari</button>
            </form>
        </div>
        <div class="card-body">
            <table id="myTable" class="table table-striped table-bordered dt-responsive wrap" style="width:100%">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Pembayaran Ke</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tanggal Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spps as $spp)
                    <tr>
                        <td>{{ $spp->nim_murid }}</td>
                        <td>{{ $spp->student['nama'] }}</td>
                        <td>{{ $spp->pembayaran_ke }}</td>
                        <td>{{ $spp->jumlah }}</td>
                        <td>{{ $spp->status }}</td>
                        <td>{{ $spp->tanggal_bayar }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('viewCetak.spp', $spp->nim_murid) }}">Cetak</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
