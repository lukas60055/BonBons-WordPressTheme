'use strict';

jQuery(function ($) {

    // Navigation
    $('.nav-toggle').on("click", function() {
        $('body').toggleClass('menu-open');
    });


    // Add text to Galleries
    $('a[data-lightbox="post-image"]').each( (i, e) => {
        $(e).attr('data-title', $(e).parent().children('figcaption').text());
    });
});