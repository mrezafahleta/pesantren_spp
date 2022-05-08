<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- <link rel="stylesheet" href="{{ asset('assets/home/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/home/daftar.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  

    <title>{{ config('app.name') }}</title>
</head>

<body>
   

    <div class="daftar mt-5">
        <div class="content container mb-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Silahkan isi Data Lengkap Anda</h1>
                    @if (session('success'))
                    
                    <div class="alert alert-success uppercase">{{ session('success') }}
                    </div>
                    
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('store.pendaftaran') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" maxlength="16" class="form-control">
                            @error('nik')
                                <div class="">
                                        <div class="text-red font-weight-bold text-sm ml-2">{{ $message }}</div>
                                    </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control">
                            @error('nama')
                                <div class="">
                                    <div class="text-red font-weight-bold text-sm ml-2">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">Tempat, Tanggal Lahir</label>
                            <input type="text" name="ttl" class="form-control">
                            @error('ttl')
                            <div class="">
                                <div class="text-red font-weight-bold text-sm ml-2">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">Nomor HP</label>
                            <input type="text" name="telp" maxlength="20" minlength="0" class="form-control">
                            @error('telp')
                            <div class="">
                                <div class="text-red font-weight-bold text-sm ml-2">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">Jenis Kelamin</label>
                            <select name="jk" class="form-control" id="">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="Laki Laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jk')
                            <div class="">
                                <div class="text-red font-weight-bold text-sm ml-2">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">Alamat</label>
                           <textarea name="alamat" id=""  rows="5" class="form-control"></textarea>
                           @error('alamat')
                            <div class="">
                                <div class="text-red font-weight-bold text-sm ml-2">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                      
                        <button class="btn btn-danger text-white btn-block">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
     <div class="footer">
            <div class="row">
                <div class="col-md-3">
                    <div class="judul-footer">
                        <p>Pesantren NurAllah</p>
                    </div>
                    <div class="kata-kata-footer">
                        <p>
                            Menerima Siswa baru
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="judul-footer">
                        <p>Alamat</p>
                    </div>
                    <div class="kata-kata-footer">
                        <p>
                            Jl. Jend. Basuki Rachmat, Ario Kemuning, Kec. Ilir Tim. I, Kota Palembang, Sumatera Selatan
                            30151
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="judul-footer">
                        <p>Sosial Media</p>
                    </div>
                    <div class="kata-kata-footer">
                        <a href="https://www.instagram.com/mahaddarululum_alburhan/?hl=id">IG: Mahad Darul Ulum Al
                            Burhan</a>
                        {{-- <p>Facebook : Pesantren NurAllah</p> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="judul-footer">
                        <p>Contact</p>
                    </div>
                    <div class="kata-kata-footer">
                        {{-- <p>
                            mrezafahleta1997@gmail.com
                        </p> --}}
                        <p>
                            (0711) 814477
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright-footer">
                        Copyright 2021 • All rights reserved • Pesantren MAHAD DARUL ULUM AL BURHAN
                    </p>
                </div>
            </div>
        </div>
    </div>

    

  
</body>

</html>