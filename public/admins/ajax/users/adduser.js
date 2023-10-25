$(document).ready(function () {
    $('.addUserForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({
            type: 'POST',
            url: '/users/addusers',
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

                    setTimeout(function () {
                        location.reload();
                    }, 1000);
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
