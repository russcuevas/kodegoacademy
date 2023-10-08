// REGISTRATION PROFILE PICTURE
document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("profile_picture");
    const previewImageLabel = document.getElementById("profile_picture_label");

    fileInput.addEventListener("change", function () {
        const selectedFile = fileInput.files[0];
        if (selectedFile) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImageLabel.innerHTML = `
                    <img src="${e.target.result}" alt="Chosen Picture" width="100" height="100" style="border-radius: 50px; cursor: pointer;">
                    Click to change the picture
                `;
            };
            reader.readAsDataURL(selectedFile);
        }
    });
});

// PASSWORD VISIBILITY
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.querySelector('.password-toggle');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggle.innerHTML = '&#x1F440;';
    } else {
        passwordInput.type = 'password';
        passwordToggle.innerHTML = '&#x1F441;';
    }
}

// CONFIRM PASSWORD VISIBILITY
function toggleCPasswordVisibility() {
    const confirmPassword = document.getElementById('confirm_password');
    const confirmPasswordToggle = document.querySelector('.confirm-pass-toggle');

    if (confirmPassword.type === 'password'){
        confirmPassword.type = 'text';
        confirmPasswordToggle.innerHTML = '&#x1F440;';
    } else {
        confirmPassword.type = 'password';
        confirmPasswordToggle.innerHTML = '&#x1F441;';
    }
}

// JQUERY PASSWORD VALIDATION
$(document).ready(function () {
    $('#password').on('input', function () {
        const password = $(this).val();
        const passwordLength = password.length;

        if (passwordLength === 0) {
            $('#password-help').text('');
        } else if (passwordLength >= 8 && passwordLength <= 12) {
            $('#password-help').text('');
        } else {
            $('#password-help').text('Password must be 8 - 12 characters');
        }
    });
});

// JQUERY CONFIRM PASSWORD VALIDATION
$(document).ready(function () {
    $('#confirm_password').on('input', function () {
        const confirmPassword = $(this).val();
        const password = $('#password').val();
        const cPasswordHelp = $('#c-password-help');

        if (confirmPassword === 0) {
            cPasswordHelp.text('');
        } else if (confirmPassword === password) {
            cPasswordHelp.text('Password match');
            cPasswordHelp.removeClass('text-danger');
            cPasswordHelp.addClass('text-success');
        } else {
            cPasswordHelp.text('Passwords do not match');
            cPasswordHelp.removeClass('text-success');
            cPasswordHelp.addClass('text-danger');
        }
    });
});


