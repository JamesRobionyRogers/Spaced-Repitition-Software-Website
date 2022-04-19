$(document).ready(function () {
    
    
    $('div.lesson-cards').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        autoplay: false,     // TESTING: true
        autoplaySpeed: 2500, 
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
  
    });


});