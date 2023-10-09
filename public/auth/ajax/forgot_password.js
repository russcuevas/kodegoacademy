// FORGOT PASSWORD REQUEST
$(document).ready(function () {
    $('.forgotPasswordForm').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '/forgot-password',
            data: formData,
            success: function (response) {
                console.log(response);
                if (response.redirect_route) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    })
                }
            },
            error: function (xhr, status, error) {
                if (xhr.status === 404) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseText,
                    });
                } else {
                    console.error(xhr.responseText);
                }
            }
        });
    });
});