$(document).ready(function () {
    $('#myTable').DataTable({
        responsive: true
    });
});

const menuToggle = document.getElementById("menu-toggle");
const sidebar = document.getElementById("sidebar");

menuToggle.addEventListener("click", () => {
    if (window.innerWidth <= 768) {
        sidebar.style.display = (sidebar.style.display === "none") ? "block" : "none";
    } else {
        sidebar.style.display = (sidebar.style.display === "none") ? "block" : "none";
    }
});

if (window.innerWidth < 768) {
    sidebar.style.display = "none";
}

function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdown-content");
    if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
    } else {
        dropdownContent.style.display = "block";
    }
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('#user-image')) {
        var dropdownContent = document.getElementById("dropdown-content");
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        }
    }
}


