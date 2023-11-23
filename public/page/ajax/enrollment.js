// ENROLLMENT AJAX
$(document).ready(function () {
    $('.enrollmentForm').submit(function (e) {
        e.preventDefault();

        var offeredId = $(this).find('.enroll-btn').data('offered-id');
        $(this).find('[name="offered_id"]').val(offeredId);

        var url = '/enroll/' + offeredId;

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                } else if (response.status === 400) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    })
                } else if (response.status === 401) {
                    Swal.fire({
                        icon: 'question',
                        title: response.message,
                    });
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
});

// FUNCTION IF CONFIRM OR NOT THE ENROLLMENT
function confirmEnrollment(button) {
    var courseName = $(button).data('course-name');
    Swal.fire({
        title: 'Are you sure?',
        text: `You want to enroll in the course "${courseName}"?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, enroll!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $(button).closest('.enrollmentForm').submit();
        }
    });
}

// DELETE ENROLLMENT
// $(document).ready(function () {
//     $('.delete-enrollment').on('click', function (e) {
//         e.preventDefault();

//         var enrollmentId = $(this).data('enrollment-id');

//         if (confirm('Are you sure you want to delete this enrollment?')) {
//             $.ajax({
//                 type: 'DELETE',
//                 url: '/delete-enrollee/' + enrollmentId,
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 },
//                 success: function (response) {
//                     console.log('Enrollment deleted successfully');
//                 },
//                 error: function (error) {
//                     console.error('Error deleting enrollment:', error);
//                 }
//             });
//         }
//     });
// });

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
                    url: '/delete-enrollee/' + enrollmentId,
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
                            text: error.responseJSON.message
                        });
                    }
                });
            }
        });
    });
});

