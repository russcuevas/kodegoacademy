<!-- print.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Enrollees - Print</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('instructor/css/print.css') }}" media="print">
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <table id="myTable" class="display table-hover">
                <thead>
                    <tr>
                        <th>Enrollee Name</th>
                        <th>Enrollee Email</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($enrollments as $enrollment)
                        <tr>
                            <td>{{ $counter++ }}.) {{ $enrollment->user->name }}</td>
                            <td>{{ $enrollment->user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <button onclick="window.print()">Print</button>
        </div>
    </div>
</body>
</html>
