@extends('layouts.cetak')


@push('style')
    <style>
        .kartu {
            width: 600px;
            height: 500px;
            border: 1px solid gray;
            margin-left: -20px;
            border-radius: 10px;
        }
        .kartu-header{
            background-color: purple;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .tabel-kartu{
            margin-top: 100px;
            padding: 20px;
        }
     
        .wrap-logo {
            display: flex;
            position: absolute;    
        }
        .wrap-kiri {
            position: absolute;
            left: 20px;
        }
        .wrap-kanan {
            position: absolute;
            left: 430px;
        }
        .wrap-tanggal-kiri {
            margin-top: 70px;
            position: absolute;
            left: 20px;
        }
        .wrap-tanggal-kanan {
            margin-top: 70px;
            position: absolute;
            left: 405px;
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

          
             <div class="wrap-logo">
                <div class="wrap-kiri">
                    <h5><i>Pesantren Mahad Darul Ulum Al Burhan</i></h5>
                    <p style="margin-top: -10px">Telp : 0832193219</p>
                </div>
                <div class="wrap-kanan">
                    <h5>Nomor Kwitansi </h5>
                    <p  style="margin-top: -10px; text-align: center;" ><b>{{ $spp->nomor_pembayaran }}</b></p>
                </div>
                
                <div class="wrap-tanggal-kiri">
                    <p>Pembayaran ke : <b>{{ $spp->pembayaran_ke }}</b></p>
                 </div>
                 <div class="wrap-tanggal-kanan">
                     <p>Tanggal : <b> {{ date('d-M-Y', strtotime($spp->tanggal_bayar)) }}</b> </p>
                 </div>
             </div>

           
                       
            <div class="tabel-kartu">
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
            </div>
                    
                     
                </div>
            </div>     
       
    </div>
</div>
@endsection
