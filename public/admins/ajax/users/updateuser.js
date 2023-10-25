$(document).ready(function () {
    $('.updateUserForm').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');
        var formData = new FormData(form[0]);
        formData.append('_method', 'PUT');

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    });
                    $('#updateUserModal' + response.id).modal('hide');
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else if (response.status === 422) {
                    var errorMessages = '';
                    for (var key in response.errors) {
                        errorMessages += response.errors[key][0] + '<br>';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessages,
                    });
                } else if (response.status === 404) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr, status, error);
            }
        });
    });
});
