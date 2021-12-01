<div class="pesan" data-pesan="{{ session('success') }}"></div>
<div class="pesanhapus" data-pesanhapus="{{ session('successhapus') }}"></div>
<div class="notfound" data-notfound="{{ session('notfound') }}" </div> @push('styles') <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
    @endpush

    @push('scripts')
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
    <script>
        const pesan = $('.pesan').data('pesan');
        const pesanhapus = $('.pesanhapus').data('pesanhapus');
        const notfound = $('.notfound').data('notfound');
        $(function () {

            var Toast = Swal.mixin({
                toast: true,
                position: 'top-center',
                showConfirmButton: false,
                timer: 5000
            });

            if (pesan) {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Berhasil',
                    body: "{{ session('success') }}",
                    timer: 5000
                })
            }

            if (notfound) {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Not Found',
                    body: "{{ session('notfound') }}",
                    timer: 5000
                })
            }


            if (pesanhapus) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    text: "Sukses",
                    title: "Data berhasil dihapus",
                    showConfirmButton: true,
                    timer: 5000,
                });
            }
        })

    </script>
    @endpush
