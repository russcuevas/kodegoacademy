    
    </div>

    <div id="loading-container" style="display: none;">
        <div id="loading-spinner" class="spinner"></div>
        <div id="loading-text">Please wait...</div>
    </div>

    <div id="backdrop"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('instructor/js/datatable.js') }}"></script>
    <script>
    document.getElementById('loading-container').style.display = 'block';
    document.getElementById('backdrop').style.display = 'block';

    setTimeout(function () {
        document.getElementById('loading-container').style.display = 'none';
        document.getElementById('backdrop').style.display = 'none';
        document.getElementById('dashboard').style.display = 'block';
    }, 300);
</script>


</body>
</html>