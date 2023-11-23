$(document).ready(function () {
    $('.delete-enrollment').on('click', function (e) {
        e.preventDefault();

        var enrollmentId = $(this).data('enrollment-id');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: '/enrollments/' + enrollmentId,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response)
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        })
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    },
                    error: function (error) {
                        console.log(error)
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message
                        });
                    }
                });
            }
        });
    });
});