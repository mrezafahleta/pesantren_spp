@extends('layouts.cetak')


@section('content')
<div class="continer" style=""">
    <div class=" card">
    <div style="text-align:center" class="card-header bg-primary text-white text-center">
        <h4 style="">Laporan Pembayaran SPP</h4>
        <h4 style="text-align: center"">Pesantren ABC</h4>

            <h4> {{ date('d-m-Y', strtotime($dari)) }} -
                {{ date('d-m-y',strtotime($sampai)) }}</h4>
        </div>
        <div class=" card-body">
            <table class="table " border="1" style="width: 100%; border-collapse:collapse; ">
                <thead>
                    <tr style="padding: 20px">
                        <th style="padding:10px">Nama</th>
                        <th style="padding:10px">Pembayaran Ke</th>
                        <th style="padding:10px">Jumlah</th>
                        <th style="padding:10px">Status</th>
                        <th style="padding:10px">Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spp as $item)
                    <tr>
                        <td style="padding:10px">{{ $item->student['nama'] }}</td>
                        <td style="padding:10px; text-align:center;">{{ $item->pembayaran_ke }}</td>
                        <td style="padding:10px; text-align:right">{{ $item->jumlah }}</td>
                        <td style="padding:10px; text-align:center">{{ $item->status }}</td>
                        <td style="padding:10px; text-align:center">
                            {{ date('d - m - Y',strtotime( $item->tanggal_bayar))  }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <button>Cetak</button> --}}

    </div>
</div>
</div>
@endsection
