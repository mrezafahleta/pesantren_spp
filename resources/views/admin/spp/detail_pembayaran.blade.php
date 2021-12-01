@extends('layouts.app',['title' => $title])

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                          <h3>Nomor Induk Siswa : <b>{{ $data->nim }}</b> </h3>
                          <a href="{{ route('pembayaran.spp') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('store.spp') }}" method="POST">
                    @csrf
                    <input type="text" name="nim_murid" value="{{ $data->nim }}" hidden >
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                              <table class="table">
                                  <tr>
                                      <th>Nomor Induk Siswa</th>
                                      <td><b>{{ $data->nim }}</b></td>
                                  </tr>
                                  <tr>
                                      <th>Nama</th>
                                      <td class="text-uppercase"><b>{{ $data->nama }}</b></td>
                                  </tr>
                                  <tr>
                                      <th>Tempat, Tanggal Lahir</th>
                                      <td><b>{{ $data->ttl }}</b></td>
                                  </tr>
                                  <tr>
                                      <th>Telah Bayar </th>
                                      <td><b>{{ $telah_bayar }} X </b></td>
                                  </tr>
                                  <tr>
                                      <th>Total Pembayaran</th>
                                      <td><b>Rp.{{ number_format($total_pembayaran,0,',','.')}}</b></td>
                                  </tr>
                              </table>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="jumlah">Pembayaran Ke</label>
                                <input readonly type="text" class="form-control" name="pembayaran_ke" value="{{ $telah_bayar +1 }}">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Pembayaran</label>
                                <input type="text" class="form-control" name="jumlah">
                                   @error('jumlah')
                                   <div class="text-danger mt-1">{{ $message }}</div>
                                   @enderror
                            </div>
                              <div class="form-group">
                                  <label for="tanggal_bayar">Tanggal Pembayaran</label>
                                  <input type="date" class="form-control" name="tanggal_bayar">
                                     @error('tanggal_bayar')
                                     <div class="text-danger mt-1">{{ $message }}</div>
                                     @enderror
                              </div>
                              <div class="form-group">
                                  <label for="">Status Pembayaran</label>
                                  <select class="form-control" name="status" id="status">
                                      <option value="LUNAS">Lunas</option>
                                      <option value="BELUM LUNAS">Belum Lunas</option>
                                  </select>
                              </div>
                             <div class="d-flex justify-content-end">
                                 <button class="btn btn-success text-white" type="submit">Bayar</button>
                             </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection