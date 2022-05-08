@extends('layouts.app', ['title' => $title])

@push('styles')
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">

<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
<script src="{{ asset('assets/myjquery.min.js') }}"></script>

{{-- sweetalert2 --}}
<link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/datatable/css/jquery.dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/datatable/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/datatable/css/responsive.bootstrap4.min.css') }}">

@endpush

@push('scripts')
<script src="{{ asset('assets/datatable/js/jquery.dataTables.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
<script src="{{ asset('assets/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    $('#myTable').DataTable({
        responsive: true,
        
        
    });
    
 
    function deleteData(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
              $.ajax({
                url : 'data_siswa/delete/' + id , 
                type : 'delete',
                dataType : 'json',
                success : function (result) {
                  location.reload();
                }
              });
            }
        });
    }

</script>
@endpush

@section('content')
<section id="data-siswa">
    <div class="pt-3">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h3 class="judul">Data Siswa Pesantren ABC</h3>
                <h3 class="judul">Tahun 2021</h3>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="card">
            @include('layouts.alert')

            @if (session('success'))

            <div class="alert alert-success uppercase">{{ session('success') }}
            </div>

            @endif
            <div class="card-body">
                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>TTL</th>
                        
                            <th>telp</th>
                            <th class="text-center" style="width: 10px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->nik }}</td>
                            <td>{{ $student->nama }}</td>
                         
                            <td>{{ $student->alamat }}</td>
                            <td>{{ $student->telp }}</td>
                            <td style="">
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('siswa.info', $student->nik) }}"
                                        class="btn btn-info text-white ml-2">Info</a>
                                    <a href="{{ route('siswa.edit', $student->nik) }}"
                                        class="btn btn-info text-white ml-2">Edit</a>
                                        
                                    <a href="javascript:void(0)"
                                        id="delete" onclick="deleteData({{$student->nik}})" class="btn btn-danger text-white ml-2">Delete</a>
                                        
                                    {{-- <form id="hapus" action="{{ route('siswa.delete',$student->nik) }}" method="POST"
                                        class="">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="deleteData()">Hapus</button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
