@extends('layouts.cetak')


@section('content')
<div class="continer">
    <div class=" card">
        <div style="text-align:center" class="card-header bg-primary text-white text-center">
            <h4>Laporan Pembayaran SPP</h4>
            <h4 style="text-align: center"">Pesantren ABC</h4>

        </div>
        <div class=" card-body">
                <table class="table " border="1" style="width: 100%; border-collapse:collapse; ">
                    <thead style="background-color: purple; color:white; width=:100%;">
                        <tr style="padding: 20px">
                            <th style="padding:10px">Nama</th>
                            <th style="padding:10px">Pembayaran Ke</th>
                            <th style="padding:10px">Jumlah</th>
                            <th style="padding:10px">Status</th>
                            <th style="padding:10px">Tanggal Bayar</th>
                        </tr>
                    </thead>
                    <tbody style="background-color:yellowgreen; ">
                        @foreach ($spp as $item)
                        <tr>
                            <td style="padding:10px">{{ $item->student['nama'] }}</td>
                            <td style="padding:10px; text-align:center;">{{ $item->pembayaran_ke }}</td>
                            <td style="padding:10px; text-align:right">Rp.{{ number_format($item->jumlah,0,',','.') }}
                            </td>
                            <td style="padding:10px; text-align:center">{{ $item->status }}</td>
                            <td style="padding:10px; text-align:center">
                                {{ date('d - m - Y',strtotime( $item->tanggal_bayar))  }}
                            </td>
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

                {{-- <button>Cetak</button> --}}

        </div>
    </div>
</div>
@endsection
