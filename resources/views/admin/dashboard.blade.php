@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/jquery.js') }}"></script>

@endpush

@section('content')
<div class="dashboard text-white">
    <h1 class="text-center">Selamat Datang di Dashboard </h1>
    <h1 class="text-center">Mahad Darul Ulum Al Burhan</h1>
    <div class="frame">
        <img class="foto" src="{{ asset('assets/image/bg.jpeg') }}" alt="">
    </div>
</div>
@endsection
