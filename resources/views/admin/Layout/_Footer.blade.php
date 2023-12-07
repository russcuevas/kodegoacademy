    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('page/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    {{-- AJAX --}}
    <script src="{{ asset('admins/ajax/_Dashboardajax.js')}}"></script>
    {{-- AJAX FOR USERS --}}
    <script src="{{ asset('admins/ajax/users/_Userajax.js')}}"></script>
    {{-- AJAX FOR INSTRUCTORS --}}
    <script src="{{ asset('admins/ajax/instructors/_Instructorsajax.js')}}"></script>
    {{-- AJAX FOR COURSE --}}
    <script src="{{ asset('admins/ajax/course/_Courseajax.js') }} "></script>
    {{-- CUSTOM JS --}}
    <script src="{{ asset('admins/js/datatable.js') }}"></script>
    <script src="{{ asset('admins/js/usersdashboard.js')}}"></script>
    <script src="{{ asset('admins/js/chart.js')}}"></script>
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