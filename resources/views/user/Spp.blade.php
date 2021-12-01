@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/jquery.js') }}"></script>

@endpush

@section('content')
<div class="container mt-2">
    <div class="card">
        <div class="card-header bg-primary">
            <h5 class="text-white">History Pembayaran</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
               <thead>
                <tr>
                    <th>Nomor Pembayaran</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Pembayaran Ke</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal Bayar</th>
                </tr>
               </thead>
               <tbody>
                   @foreach ($spp as $data)
                       <tr>
                           <td>{{ $data->nomor_pembayaran }}</td>
                           <td>{{ $data->nim_murid }}</td>
                           <td>{{ $data->student->nama }}</td>
                           <td>{{ $data->pembayaran_ke }}</td>
                           <td>{{ $data->jumlah }}</td>
                           <td>{{ date('d-m-Y', strtotime($data->tanggal_bayar)) }}</td>
                           <td class="text-white"><h5>
                            <span class="badge {{ $data->status == "LUNAS" ? 'badge-success' : 'badge-danger' }} ">{{ $data->status }}</span></h5></td>
                       </tr>
                   @endforeach
               </tbody>
            </table>
        </div>
    </div>
</div>
@endsection