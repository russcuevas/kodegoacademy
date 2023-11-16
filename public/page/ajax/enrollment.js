// ENROLLMENT AJAX
$(document).ready(function () {
    $('.enrollmentForm').submit(function (e) {
        e.preventDefault();

        var url = '/enroll/' + $(this).find('[name="offered_id"]').val();

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                } else if (response.status === 400) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    })
                } else if (response.status === 401) {
                    Swal.fire({
                        icon: 'question',
                        title: response.message,
                    });
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
});

// FUNCTION IF CONFIRM OR NOT THE ENROLLMENT
function confirmEnrollment(courseName) {
    Swal.fire({
        title: 'Are you sure?',
        text: `You want to enroll in the course "${courseName}"?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, enroll!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $('.enrollmentForm').submit();
        }
    });
}
