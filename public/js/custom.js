$(document).ready(function () {

    if (!isMobile()) {
        window.onscroll = function () {
            var top = window.pageYOffset || document.documentElement.scrollTop;
            if (top > 422) {
                $('.scrollToTop').fadeIn();
            } else if (top < 422) {
                $('.scrollToTop').fadeOut();
            }
        }
    }

    /**
     * @function isMobile
     * detecta se o useragent e um dispositivo mobile
     */
    function isMobile() {
        var userAgent = navigator.userAgent.toLowerCase();
        if (userAgent.search(/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i) != -1)
            return true;
        return false;
    }


//Click event to scroll to top
    $('.scrollToTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

    // Dropdown Categorias
    $('.dropdown').on('mouseenter', function () {
        if(!$(this).hasClass('open'))
            $('.dropdown-toggle').click();

    }).on('mouseleave', function () {
        if($(this).hasClass('open'))
        $('.dropdown-toggle').click();
    })


   $('.thumbnail-post .thumbnail').on('mouseover', function (){
        $('.caption', this).fadeIn(300);
   });

    $('.thumbnail-post .thumbnail').on('mouseleave', function (){
        $('.caption', this).fadeOut(300);
    });


});



