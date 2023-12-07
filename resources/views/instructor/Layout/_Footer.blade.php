<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('page/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('instructor/js/datatable.js') }}"></script>
{{-- AJAX --}}
<script src="{{ asset('instructor/ajax/_Deleteenrolleeajax.js')}}"></script>
<script src="{{ asset('instructor/ajax/_Changepwajax.js')}}"></script>
<script src="{{ asset('instructor/ajax/_Changestatusajax.js')}}"></script>
@if(session('success_message'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session('success_message') }}',
            toast: true,
            showConfirmButton: false,
            position: 'top-end',
            timer: 3000,
            timerProgressBar: true
        });
    </script>
@endif



</body>
</html>