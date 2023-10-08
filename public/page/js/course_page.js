// FILTER BY COURSE
document.getElementById("course-select").addEventListener("change", function() {
    var selectedOption = this.value;

    var courseCards = document.querySelectorAll(".mb-4[data-course]");
    courseCards.forEach(function(card){
        var cardCourse = card.getAttribute("data-course");

        if (cardCourse === selectedOption || selectedOption === ""){
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
});