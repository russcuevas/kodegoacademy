$(document).ready(function () {
    $('.change-status').click(function () {
        var enrollmentId = $(this).data('enrollment-id');
        var status = $(this).data('status');

        $.ajax({
            type: 'POST',
            url: '/cancelled-enrollee',
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
    });
});