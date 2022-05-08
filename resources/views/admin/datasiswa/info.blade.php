@extends('layouts.app', ['title' => $title])


@section('content')
<div class="mt-4 container">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="text-center">Detail Data <i>{{ $student->nama }}</i></h4>
            <h5  class="text-center">({{ $student->nik }})</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="text-center mb-3">Profil</h2>
                                </div>
                                @if ($student->foto == NULL)
                                <img class="img-fluid rounded-circle m-auto" style="width: 250px; height:200px"
                                    src="{{ asset('assets/image/pngtree-avatar-icon-profile-icon-member-login-vector-isolated-png-image_1978396.jpg') }}">
                                 
                                @else
                                  <img class="img-fluid rounded-circle m-auto" style="width: 250px; height:200px" src="{{ $student->takeImage }}">
                                @endif
                                <table class="table mt-2 ">
                                    <tr>
                                        <th>
                                            <h5>Nama</h5>
                                        </th>
                                        <td class="text-center text-uppercase">
                                            <h5>{{ $student->nama }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <h5>Tempat, Tanggal Lahir</h5>
                                        </th>
                                        <td class="text-center">
                                            <h5>{{ $student->ttl }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <h5>Alamat</h5>
                                        </th>
                                        <td class="text-center">
                                            <h5>{{ $student->alamat }}</h5>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <h5>Jenis Kelamin</h5>
                                        </th>
                                        <td class="text-center">
                                            <h5>{{ $student->jk }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <h5>Telpon</h5>
                                        </th>
                                        <td class="text-center">
                                            <h5>{{ $student->telp }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <h5>Tanggal Masuk</h5>
                                        </th>
                                        <td class="text-center">
                                            <h5>{{ $student->tanggal_masuk }}</h5>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">
                            <h3>Pembayaran SPP</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Nomor Pembayaran</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($spps as $spp)
                                        <tr>
                                            <td>{{ $spp->nomor_pembayaran }}</td>
                                            <td>{{ $spp->jumlah }}</td>
                                            <td>{{ $spp->tanggal_bayar }}</td>
                                            <td>{{ $spp->status }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
