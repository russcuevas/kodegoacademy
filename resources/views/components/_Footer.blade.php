    {{-- PLUGINS --}}
    <script src="{{ asset('page/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- AJAX --}}
    <script src="{{ asset('page/ajax/contact.js') }}"></script>
    <script src="{{ asset('page/ajax/enrollment.js')}}"></script>
    {{-- CUSTOM JS --}}
    <script src="{{ asset('page/js/page.js') }}"></script>
    <script src="{{ asset('page/js/course_page.js') }}"></script>
    <script src="{{ asset('page/vendor/tilt/tilt.jquery.min.js') }}"></script>
    {{-- NOTIFICATION MESSAGE --}}
    <script>
        document.getElementById('notificationIcon').addEventListener('click', function () {
            var notificationPanel = document.getElementById('notificationPanel');

            if (notificationPanel.style.display === 'none' || notificationPanel.style.display === '') {
                notificationPanel.style.display = 'block';
            } else {
                notificationPanel.style.display = 'none';
            }
        });
    </script>
</body>
</html>
