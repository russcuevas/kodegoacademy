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
