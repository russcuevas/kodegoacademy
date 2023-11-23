<!-- print.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Enrollees - Print</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('instructor/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('instructor/css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('instructor/css/dashboard.css') }}">
    <link rel="shortcut icon" href="{{ asset('instructor/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('page/sweetalert2/dist/sweetalert2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('instructor/css/print.css') }}" media="print">
</head>
<body>
    <div class="information">
        <a href="{{ route('enrollpage') }}" class="btn btn-warning" id="hideGoback" style="text-decoration: none; margin-left: 10px; margin-top: 10px">Go back</a>
        <h1 class="text-center">Enrollee List</h1>
    </div>
    <div class="container mt-5">
        <div class="table-responsive">
            <table id="myTable" class="display table-hover">
                <thead>
                    <tr>
                        <th>Enrollee Picture</th>
                        <th>Enrollee Name</th>
                        <th>Enrollee Email</th>
                        <th>Enrollee Contact</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $list = 1;
                    @endphp
                    @foreach ($enrollments as $enrollment)
                        <tr>
                            <td>
                                <img style="height: 50px; width: 50px;" src="{{ asset('storage/auth/images/profile_pictures/' . $enrollment->user->profile_picture) }}" style="height: 100px; width: 100px;" alt="Profile Picture">
                            </td>
                            <td>{{ $list++ }}.) {{ $enrollment->user->name }}</td>
                            <td>{{ $enrollment->user->email }}</td>
                            <td>{{ $enrollment->user->contact }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <button class="btn btn-primary" id="hideButton" onclick="window.print()">Print enrollee</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('page/sweetalert2/dist/sweetalert2.min.js') }}"></script>

</body>
</html>
