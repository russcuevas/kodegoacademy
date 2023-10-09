// LOGIN REQUEST
$(document).ready(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '/loginrequest',
            data: formData,
            success: function (response) {
                console.log(response);
                if (response.redirect_route) {
                    window.location.href = response.redirect_route;
                }
            },
            error: function (xhr, status, error) {
                if (xhr.status === 401) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: 'Invalid credentials. Please try again.',
                    });
                } else {
                    console.error(xhr.responseText);
                }
            }
        });
    });
});
