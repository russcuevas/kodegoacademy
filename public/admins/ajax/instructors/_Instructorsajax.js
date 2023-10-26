// ADD INSTRUCTORS AJAX
$(document).ready(function () {
    $('.addInstructorForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({
            type: 'POST',
            url: '/instructors/addinstructors',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else if (response.status === 400) {
                    var errorMessages = '';
                    for (var key in response.errors) {
                        errorMessages += response.errors[key][0] + '<br>';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessages,
                    })
                }
            }
        });
    });
});


// UPDATE INSTRUCTOR AJAX
$(document).ready(function () {
    $('.updateInstructorForm').on('submit', function (e) {
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
                console.log(response);
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message
                    })
                    $('#updateInstructorModal' + response.id).modal('hide');
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
                    window.location.href = '/instructors';
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr, status, error);
            }
        })
    });
});

// DELETE INSTRUCTOR AJAX
$(document).ready(function () {
    $('.deleteInstructorForm').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: 'DELETE',
            url: url,
            data: form.serialize(),
            success: function (response) {
                console.log(response);
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    });
                    $('#deleteInstructorModal' + response.id).modal('hide');

                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else if (response.status === 404) {
                    window.location.href = '/instructors';
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});