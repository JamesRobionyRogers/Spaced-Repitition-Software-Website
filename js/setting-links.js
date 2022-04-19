
// Page link vairable
var homePage = "index.php";
var resultsPage = "results.php"; 
var highscorePage = "highscores.php"; 

// Lesson card Illustrations
var lessonCardTop = "./imgs/lesson-card-top.svg";
var enviroSVG = "./imgs/undraw_environment.svg";

// JQuery setting page links
$(document).ready(function() {
    $(".home-page").attr("href", homePage);

    $(".highscore-page").attr("href", highscorePage); 
    

});

// TODO: Once created pages link them (Uncomment)
// $(".results-page").attr("href", resultsPage);



// JQuery setting tutorial card images
// $("img.illustration.card-top").attr("src", lessonCardTop);
$("img.illustration.enviro").attr("src", enviroSVG);


var dropdownClicked = ""; 

// Drop down the menu when clicking the "Quizzes" button 
$('.dropdown').click(function () {
    dropdownClicked = "Quizzes"; 
});

// Drop down the menu when clicking the "Learn" button 
$('.dropdown-learn').click(function () {
    dropdownClicked = "Learn"; 
});


// Checking if a dropdown link is clicked
$('.dropdown-content .link').click(function() {

    let clickedTag = $(this).text();        // stores the text of the dropdown link

    if (dropdownClicked == "Quizzes") {
        // Assigning the link
        if (clickedTag == "Ngati Toa") { $(this).attr('href', "question.php?id=1"); }
        if (clickedTag == "Onslow College") { $(this).attr('href', "question.php?id=2"); }
        if (clickedTag == "Johnsonville") { $(this).attr('href', "question.php?id=3"); }
        if (clickedTag == "Wellington") { $(this).attr('href', "question.php?id=4"); }
        if (clickedTag == "School Values") { $(this).attr('href', "question.php?id=5"); }
    }

    if (dropdownClicked == "Learn") {
        // Assigning the link
        if (clickedTag == "Ngati Toa") { $(this).attr('href', "ngati-toa.php"); }
        if (clickedTag == "Onslow College") { $(this).attr('href', "onslow-college.php"); }
        if (clickedTag == "Johnsonville") { $(this).attr('href', "johnsonville.php"); }
        if (clickedTag == "Wellington") { $(this).attr('href', "wellington.php"); }
        if (clickedTag == "School Values") { $(this).attr('href', "school-values.php"); }
    }

    
})
