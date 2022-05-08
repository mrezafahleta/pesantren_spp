@extends('layouts.cetak')


@section('content')

<div style="text-align:center" class="card-header bg-primary text-white text-center">
    <h4 style="">Laporan Pembayaran SPP</h4>
    <h4 style="text-align: center"">Mahad Darul Ulum Al Burhan</h4>

            <h4> {{ date('d-m-Y', strtotime($dari)) }} -
                {{ date('d-m-y',strtotime($sampai)) }}</h4>

</div>
<div class="mt-5">
    <table class=" table table-bordered ">
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
                    <td style="padding:10px; text-align:right">Rp.{{ number_format($item->jumlah, 0,',','.') }}</td>
                    <td style="padding:10px; text-align:center">{{ $item->status }}</td>
                    <td style="padding:10px; text-align:center">
                        {{ date('d - m - Y',strtotime( $item->tanggal_bayar)) }}</td>
                </tr>
                @endforeach
            </tbody>
           <tfoot>
                <tr>
                    <td style="text-align:right; padding:10px" colspan="4">Total Pembayaran</td>
                    <td style="text-align: center; padding:10px" colspan="1">
                        Rp.{{ number_format($total,0,',','.') }}</td>
                </tr>
            </tfoot>
        </table>
</div>
@endsection