// CHANGE STATUS ENROLLMENT AJAX
$(document).ready(function () {
    $('.change-status').click(function () {
        var enrollmentId = $(this).data('enrollment-id');
        var status = $(this).data('status');

        if (status === 'Cancelled') {
            Swal.fire({
                icon: 'question',
                title: 'Are you sure?',
                text: 'Do you want to cancel this enrollment?',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, cancel it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    performStatusChange(enrollmentId, status);
                }
            });
        } else {
            performStatusChange(enrollmentId, status);
        }
    });

    function performStatusChange(enrollmentId, status) {
        $.ajax({
            type: 'POST',
            url: '/enrollment-status',
            data: {
                'enrollment_id': enrollmentId,
                'status': status
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response.message);
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                    })
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else if (response.status === 400) {
                    var errorMessages = '';
                    for (var key in response.errors) {
                        errorMessages += response.errors[key][0] + '<br>';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessages,
                    });
                }
            },
            error: function (response) {
                console.log('Error:', response);
            }
        });
    }
});
