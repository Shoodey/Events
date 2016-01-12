@section('scripts')
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "9999900",
            "hideDuration": "999999",
            "timeOut": "9999999",
            "extendedTimeOut": "999999",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    @if(session()->has('success'))
        <script>
            toastr.success('{{ session('success') }}')
        </script>
    @endif

    @if(session()->has('error'))
        <script>
            toastr.error('{{ session('error') }}')
        </script>
    @endif
@endsection