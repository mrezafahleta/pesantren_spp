@extends('layouts.cetak')


@section('content')

   
      <div>
          <div style="text-align:center" class="card-header bg-primary text-white text-center">
                <h4>Pembayaran SPP</h4>
                <h4 style="text-align: center">MAHAD DARUL ULUM AL BURHAN</h4>
                
            </div>
            
         <div class="mt-5">
             <table class="table table-bordered">
                    <thead style="background-color: purple; color:white; width=:100%;">
                        <tr>
                           
                            <th class="text-center">Pembayaran Ke</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Tanggal Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spp as $item)
                        <tr>
                         
                            <td class="text-center">{{ $item->pembayaran_ke }}</td>
                            <td class="text-center">Rp.{{ number_format($item->jumlah,0,',','.') }}
                            </td>
                            <td class="text-center">{{ $item->status }}</td>
                            <td class="text-center">
                                {{ date('d - m - Y',strtotime( $item->tanggal_bayar)) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td style="text-align:right; padding:10px" colspan="3">Total Pembayaran</td>
                            <td style="text-align: center; padding:10px" colspan="1">
                                Rp.{{ number_format($total,0,',','.') }}</td>
                        </tr>
                    </tfoot>
                </table>
         </div>
      </div>

                {{-- <button>Cetak</button> --}}

     
  

@endsection
