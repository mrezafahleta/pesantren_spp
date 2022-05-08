@extends('layouts.app')

@push('styles')
<script src="{{ asset('assets/jquery-auto.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/jquery-ui.css') }}">
@endpush

@push('scripts')

<script src="{{ asset('assets/jquery-ui.js') }}"></script>

<script>
    $('#cari_nim').autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "{{ route('cari-user') }}",
                type: "get",
                dataType: "json",
                data: {
                    cari: request.term
                },
                success: function (data, angka) {
                  response(data)
                }
            });
        },
        select: function (event, ui) {
            $('#cari_nim').val(ui.item.value);
            $('#nama').val(ui.item.nama);
            // $('#ttl').val(ui.item.ttl);
        }
    });
</script>
@endpush

@section('content')
<div class="container mt-5">
    @if (session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-5">

            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Assign User</h5>
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nim">NIK</label>
                            <input type="text" name="nim_murid" id="cari_nim" class="form-control">
                            @error('nik_murid')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <input type="text" placeholder="ttl" id="ttl"> --}}
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input readonly type="text" id="nama" name="nama" class="form-control">
                            @error('nama')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                         
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Assign</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Data User</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->nik_murid }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><span class="badge badge-primary">{{ $user->status }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection