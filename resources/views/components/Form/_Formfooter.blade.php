    <script src="{{ asset('page/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('page/js/HoldOn.min.js') }}"></script>
    <script src="{{ asset('auth/js/form.js') }}"></script>
    <script src="{{ asset('auth/ajax/registration.js') }}"></script>
    <script src="{{ asset('auth/ajax/login.js') }}"></script>
    @if(session('logout_message'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('logout_message') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endif
    </body>
    </html>