'use strict';

jQuery(function ($) {

    // Navigation
    $('.nav-toggle').on("click", function() {
        $('body').toggleClass('menu-open');
    });


    // Automatically adding a link to photos - Lightbox
    $('figure.wp-block-gallery figure img').each( (index, elem) => {
        $(elem).wrap(`<a data-lightbox="post-image" data-title="" href="${$(elem).attr('src')}"></a>`);
    });


    // Add text to Galleries
    $('a[data-lightbox="post-image"]').each( (index, elem) => {
        $(elem).attr('data-title', $(elem).parents().children('figcaption').text());
    });
});