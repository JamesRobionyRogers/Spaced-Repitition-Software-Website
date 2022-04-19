$(document).ready(function () {


    // Mobile Hamburger Menu

    let menuBtn = $('.burger');
    let menuOpen = false;

    menuBtn.click(function () {
        if (!menuOpen) {
            menuBtn.addClass('open');
            menuOpen = true;

            // Mobile dropdown
            $('.dropdown-content').slideToggle();

        } else {
            menuBtn.removeClass('open');
            menuOpen = false;

            // Mobile dropdown
            $('.dropdown-content').slideToggle();
        }
    });


    // Mobile dropdown contents height calc
    if ($(window).width() <= 812 && $(window).width() > 375) {

        let windowHeight = $(window).height();
        let headerHeight = $('header').outerHeight();
        let $dropdownHeight = windowHeight - headerHeight;
        $('.dropdown-content').css('height', `${$dropdownHeight}px`);

        // Dropdown ul padding calcs
        let $dropdownUlPadding = (windowHeight - headerHeight) / 0.2;
        $('.dropdown-content ul, .site-map ul').css('height', `${$dropdownUlPadding}px`);
    }



    // Desktop Nav Dropdown
    dropdownClicked = "";                               // Store the state that the dropdown is in 
    $('.dropdown-content').hide();                      // hides the dropdown from the benginning
    $('.dropdown-content').removeClass('hidden');       // hides the dropdown from the benginning

    // Drop down the menu when clicking the "Quizzes" button 
    $('.dropdown').click(function () {        
        // if (dropdownClicked === "Learn") {
        //     $('.dropdown-content').slideUp();
        //     $('.dropdown-content').slideDown();
        // }
        // else {
        //     $('.dropdown-content').slideToggle();
        // }

        // Setting the current state
        dropdownClicked = "Quizzes";
        $('.dropdown-content').slideToggle();
    });

    // Drop down the menu when clicking the "Learn" button 
    $('.dropdown-learn').click(function () {
        // if (dropdownClicked === "Quizzes") {
        //     $('.dropdown-content').slideUp();    
        //     $('.dropdown-content').slideDown();
        // }
        // else {
        //     $('.dropdown-content').slideToggle();
        // }

        // Setting the current state 
        dropdownClicked = "Learn";
        $('.dropdown-content').slideToggle();
    });

    console.log(dropdownClicked); 

    // slides up the dropdown if clicking outside of the header/dropdown div
    $('#title-container, .container, .tutorial-cards, .tutorial-title-container, .tutorial-container, footer').click(function () {
        $('.dropdown-content').slideUp();
    });




});