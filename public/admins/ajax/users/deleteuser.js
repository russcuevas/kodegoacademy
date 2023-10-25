$(document).ready(function () {
    $('.deleteUserForm').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: 'DELETE',
            url: url,
            data: form.serialize(),
            success: function (response) {
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted successfully',
                        text: response.message,
                    });
                    $('#deleteUserModal' + response.id).modal('hide');

                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else if (response.status === 404) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Deleted error',
                        text: response.message,
                    });
                }
            },
            error: function (xhr, error) {
                console.log(error);
            }
        });
    });
});
