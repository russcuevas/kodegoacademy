// FILTER BY COURSE
document.getElementById("course-select").addEventListener("change", function () {
    var selectedOption = this.value;
    var courseCards = document.querySelectorAll(".mb-4[data-course]");
    var anyCardsDisplayed = false;

    courseCards.forEach(function (card) {
        var cardCourse = card.getAttribute("data-course");

        if (cardCourse === selectedOption || selectedOption === "") {
            card.style.display = "block";
            anyCardsDisplayed = true;
        } else {
            card.style.display = "none";
        }
    });

    var noAvailableMessage = document.getElementById("no-available-message");
    if (!anyCardsDisplayed) {
        noAvailableMessage.style.display = "block";
    } else {
        noAvailableMessage.style.display = "none";
    }
});
