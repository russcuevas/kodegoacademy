// LOGIN REQUEST
$(document).ready(function () {
    $('.loginRequest').on('submit', function (e) {
        e.preventDefault();

        var email = $('#email').val();
        var password = $('#password').val();

        if (!email || !password) {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Fill up all fields first',
            });
            return;
        }

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

// FORGOT PASSWORD REQUEST
$(document).ready(function () {
    $('.forgotPasswordForm').on('submit', function (e) {
        e.preventDefault();

        var forgot_email = $('#forgot-email').val();

        if (!forgot_email) {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Fill up fields first',
            });
            return;
        }
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '/forgot-password',
            data: formData,
            success: function (response) {
                console.log(response);

                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    });
                } else if (response.status === 400) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    });
                }
            },
            error: function (xhr,) {
                if (xhr.status === 404) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "User not found with that email.",
                    });
                } else {
                    console.error("User not found with that email.");
                }
            }
        });
    });
});


// FORGOT PASSWORD POST
$(document).ready(function () {
    $('.passwordResetForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new formData(this);

        $.ajax({
            type: 'POST',
            url: '/password/reset',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.message && response.redirect_route) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    }).then(function () {
                        window.location.href = response.redirect_route;
                    });
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = 'Validation Error:<br>';
                    for (var key in errors) {
                        errorMessage += errors[key].join(', ') + '<br>';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: errorMessage,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred.',
                    });
                }
            },
        });
    });
});