$(document).ready(function () {

    $('html').removeClass('static');


    // Calculating body-wrapper height to posision footer
    let bodyHeight = $(document).outerHeight();
    let footerHeight = $('footer').outerHeight();


    var updateFooter = function ($bodyHeight, $footerHeight) {
        var $bodyWrapperHeight = $bodyHeight - $footerHeight;
        $('#body-wrapper').css('height', `${$bodyWrapperHeight}px`);
    }

    // Update the footer last to account for the dropdown menu
    updateFooter($(document).outerHeight(), $('footer').outerHeight());

    // Detect screen rotation then updates the footer
    window.addEventListener("orientationchange", function () {
        // ran into trouble using the update footer function. fixed below
        location.reload();  // updates the footer via reloading the page
    }, false);


    // Detect window resize
    // $(window).on('resize', function () {
    //     location.reload();
    // });


});




// Some interesting thing to try for next time:

// Animate on scroll JS library:  https://michalsnik.github.io/aos/
//



//                Sources used for help:

// Footer at Bottom of Page:
// https://www.youtube.com/watch?v=Sau3hn7zEUY

// Screen Rotation Detection:
// https://stackoverflow.com/questions/5498934/detect-change-in-orientation-using-javascript

// Screen Resize Detection:
// https://stackoverflow.com/questions/9828831/jquery-on-window-resize#:~:text=jQuery%20has%20a%20resize%20event,time%20the%20window%20is%20resized.