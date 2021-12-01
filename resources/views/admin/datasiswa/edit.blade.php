@extends('layouts.app', ['title' => $title])

@section('content')
<div class="container pt-4">
    <div class="card">
        <div class="card-header">
            <h3> <i class="fas fa-user-plus"></i> Edit Data Siswa</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('siswa.edit',$student) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="nim">Nomor Induk Siswa*</label>
                            <input readonly type="text" class="form-control" name="nim" value="{{ $student->nim }}">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">

                            <label for="foto">Foto*</label>
                            
                            <input type="file" name="foto" id="foto" class="form-control">
                            @error('foto')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="tanggal">Tanggal*</label>
                            <input type="date" name="tanggal" value="{{ $student->tanggal_masuk ?? old('tanggal') }}"
                                id="tanggal" class="form-control">
                            @error('tanggal')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="nama">Nama*</label>
                            <input value="{{ $student->nama ?? old('nama') }}" type="text" name="nama"
                                class="form-control" placeholder="masukan nim siswa...">
                            @error('nama')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="ttl">Tempat, Tanggal Lahir*</label>
                                <input value="{{ $student->ttl ?? old('ttl') }}" type="text" name="ttl"
                                    class="form-control" placeholder="masukan nim ttl...">
                                @error('ttl')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="telp">Nomor Telp/Hp*</label>
                            <input value="{{ $student->telp ?? old('telp') }}" type="text" name="telp"
                                class="form-control" placeholder="masukan nim telp...">
                            @error('telp')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="jk">Jenis Kelamin*</label>
                            </div>
                            <select name="jk" id="jk" class="form-control">
                                @if( $student->jk == "Laki-Laki")
                                <option value="{{ $student->jk }}">{{ $student->jk }}</option>
                                <option value="Perempuan">Perempuan</option>
                                @elseif($student->jk == "Perempuan")
                                <option value="{{ $student->jk }}">{{ $student->jk }}</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                @else
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="alamat">Alamat*</label>
                        <textarea name="alamat" id="alamat" rows="5" class="form-control">
                           {{ $student->alamat ?? old('alamat') }}
                        </textarea>
                        @error('alamat')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-lg-12 pt-2">
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
