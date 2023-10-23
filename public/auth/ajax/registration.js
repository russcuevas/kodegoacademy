$(document).ready(function () {
    $('.registrationRequest').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({
            type: 'POST',
            url: '/registrationrequest',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status == 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    });
                } else if (response.status == 400) {
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
        });
    });
});
