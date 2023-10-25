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

// UPDATE PROFILE PICTURE
document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("profile_pictures");
    const previewImageLabel = document.getElementById("profile_picture_update");

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