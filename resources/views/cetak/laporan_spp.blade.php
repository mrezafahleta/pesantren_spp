@extends('layouts.cetak')


@push('style')
    <style>
        .kartu {
            width: 800px;
            height: 500px;
            border: 1px solid gray;
            border-radius: 5px;
        }
        .kartu-header {
            padding: 10px;
            background-color: purple;
            border-bottom: 1px solid purple;
            height: 50px;
        }
        .wrap-logo {
            display: flex;
            justify-content: space-between
        }
    </style>
@endpush
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="kartu">
                <div class="kartu-header ">
                    <h5 class="text-white text-center">Nota Pembayaran</h5>
                </div>
                <div class="card-body">
                        <div class="wrap-logo">
                            <div>
                                <h5><i>Pesantren Mahad Darul Ulum Al Burhan</i></h5>
                            <p style="margin-top: -10px">Telp : 0832193219</p>
                            </div>
                            <div class="wrap-no">
                                <h5>Nomor Kwitansi </h5>
                                <p  style="margin-top: -10px" ><b>{{ $spp->nomor_pembayaran }}</b></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                               <p>Pembayaran ke : <b>{{ $spp->pembayaran_ke }}</b></p>
                            </div>
                            <div>
                                <p>Tanggal : <b> {{ date('d-M-Y', strtotime($spp->tanggal_bayar)) }}</b> </p>
                            </div>
                        </div>

                        <table class="table table-striped">
                            <tr>
                                <td>Nomor Induk Siswa</td>
                                <td>:</td>
                                <th>{{ $spp->nik_murid }}</th>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <th>{{ $spp->student['nama'] }}</th>
                            </tr>
                            <tr>
                                <td>Jumlah Pembayaran</td>
                                <td>:</td>
                                <th>{{ $spp->jumlah }}</th>
                            </tr>
                            <tr>
                                <td>Status Pembayaran</td>
                                <td>:</td>
                                <th>{{ $spp->status}}</th>
                            </tr>
                        </table>
                    
                       <div class="d-flex justify-content-center">
                            <a href="{{ route('cetak.spp', $spp->nik_murid) }}" class="btn btn-primary">Cetak PDF</a>
                       </div>
                </div>
            </div>     
        </div>
    </div>
</div>
@endsection
