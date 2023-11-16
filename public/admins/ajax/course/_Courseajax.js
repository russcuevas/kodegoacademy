// ADD POSITION AJAX
$(document).ready(function () {
    $('.addPositionForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({
            type: 'POST',
            url: '/addposition',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message
                    });
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
            error: function (error) {
                console.log("Error :", error);
            }
        });
    });
});

// ADD COURSE OFFERED AJAX
$(document).ready(function () {
    $('.addCourseForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({
            type: 'POST',
            url: '/addcourse',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message
                    });
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
                    })
                };
            },
            error: function (error) {
                console.log("Error:", error);
            }
        });
    });
});


// ADD COURSE OFFERED AJAX
$(document).ready(function () {
    $('.addOfferedCourse').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({
            type: 'POST',
            url: '/addofferedcourse',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message
                    });
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
                    })
                };
            },
            error: function (error) {
                console.log("Error:", error);
            }
        });
    });
});