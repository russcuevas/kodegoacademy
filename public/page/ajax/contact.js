// CONTACT US HOME AND CONTACT PAGE
$(document).ready(function() {
    $('.contactForm').submit(function(e) {
        e.preventDefault();

        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var message = $('#message').val();

        if (email === '' || mobile === '' || message === ''){
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Fields cannot be empty',
                confirmButtonColor: '#facea8'
            });
            return;
        }

        var formData = {
            _token: $('input[name=_token]').val(),
            email: email,
            mobile: mobile,
            message: message
        };

        $('#backdrop').show();
        $('#loading-container').show();


        $.ajax({
            url: '/contact-form',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                $('#loading-container').hide();
                $('#backdrop').hide();
                console.log(response);

                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: true,
                        confirmButtonColor: '#9fef00',
                    }).then(function (){
                        $('.contactForm')[0].reset();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    });
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                Swal.fire({
                    title: 'Error',
                    text: 'An error occurred while submitting the form',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});