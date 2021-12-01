@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/jquery.js') }}"></script>

<script>
    $('#img').change(function() {
        if($('#img').val() !== "") {
            $('#btnUploadFoto').attr('hidden', false);
            $('#img').attr('hidden', false)
            $('#labelImg').attr('hidden', true);
            $('#batal_upload_foto').attr('hidden', false);
        }
   })

   $('#batal_upload_foto').click(function() {
            $('#btnUploadFoto').attr('hidden', true);
            $('#img').attr('hidden', true);
            $('#img').val("");
            $('#labelImg').attr('hidden', false);
            $('#batal_upload_foto').attr('hidden', true);
   });
   $('#btnEdit').on('click', function() {
     $(this).attr('hidden', true);
     $('#btnClose').attr('hidden', false);
     $('#btnUpdate').attr('hidden', false);
     $('.form-control').attr('readonly', false);
   });

   $('#btnClose').on('click', function() {
       $('#btnClose').attr('hidden', true);
       $('#btnUpdate').attr('hidden', true);
       $('#btnEdit').attr('hidden', false);
        $('.form-control').attr('readonly', true);
   });

   
</script>
@endpush

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white text-center">Foto Profil</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('update.foto') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid rounded-circle m-auto" style="width: 250px; height:200px"
                                src="{{ $profil->takeImage }}">
                        </div>
                         
                        <input hidden  name="nim" value="{{ $profil->nim }}" type="text" class="">
                        <div class="text-center mt-2">
                            <label id="labelImg" class="btn btn-info text-white" for="img">Pilih Foto Profil</label>
                            <input type="file" style="margin-left: 60px; margin-top: 10px; " id="img" name="foto"
                                id="foto" hidden>
                            <button hidden type="button" id="batal_upload_foto" class="btn btn-danger btn-sm mt-1">Batal</button>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button hidden type="submit" id="btnUploadFoto" class="btn btn-secondary mt-4">Ubah
                                Foto</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <form action="{{ route('update.profil') }}" method="POST">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="text-white text-center">Data Profil</h5>
                    </div>
                    <div class="card-body ">
                        <div class="form-group">
                            <div class="input-group mb-3 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">NIM</span>
                                </div>
                                <input readonly name="nim" value="{{ $profil->nim }}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nama</span>
                                </div>
                                <input readonly name="nama" value="{{ $profil->nama }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tempat, Tanggal Lahir</span>
                                </div>
                                <input readonly name="ttl" value="{{ $profil->ttl }}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Jenis Kelamin</span>
                                </div>
                                <input readonly name="jk" value="{{ $profil->jk }}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Telp</span>
                                </div>
                                <input readonly name="telp" value="{{ $profil->telp }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tanggal Masuk</span>
                                </div>
                                <input readonly name="tanggal_masuk"
                                    value="{{ date('d-m-Y', strtotime($profil->tanggal_masuk)) }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Alamat</span>
                                </div>
                                <input readonly name="alamat" value="{{ $profil->alamat }}" type="text"
                                    class="form-control">
                            </div>
                        </div>

                        <button id="btnEdit" type="button" class="form-control btn btn-info text-white">Edit
                            Data</button>
                        <div class="d-flex justify-content-between">
                            <button hidden id="btnUpdate" type="submit" class=" btn btn-info text-white">Simpan</button>
                            <button hidden type="button" class="btn btn-danger" id="btnClose">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection