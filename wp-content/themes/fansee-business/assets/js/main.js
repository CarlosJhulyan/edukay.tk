(function() {
    var isIe = /(trident|msie)/i.test(navigator.userAgent);

    if (isIe && document.getElementById && window.addEventListener) {
        window.addEventListener('hashchange', function() {

            var id = location.hash.substring(1),
                element;

            if (!(/^[A-z0-9_-]+$/.test(id))) {
                return;
            }

            element = document.getElementById(id);

            if (element) {
                if (!(/^(?:a|select|input|button|textarea)$/i.test(element.tagName))) {
                    element.tabIndex = -1;
                }

                element.focus();
            }
        }, false);
    }
})();

document.addEventListener('keydown', function(e) {
    e = e || window.event;
    if (e.keyCode == 27) {
        /* Creating custom event */
        const event = new Event('fanseeBusinessOnEscKeypressed');
        document.dispatchEvent(event);
    }
});

document.addEventListener('fanseeBusinessOnEscKeypressed', function() {
    jQuery('body').hasClass('fst-mmenu-open') && jQuery('.fst-mmenu-btn-close').trigger( 'click' );
});

jQuery(document).ready(function() {

    jQuery('.scroll-to-top').click(function() {
        jQuery('body,html').animate({
            scrollTop: 0
        }, 500);
    });

    var $next = jQuery( '.nav-links .nav-next' ),
        $prev = jQuery( '.nav-links .nav-previous');

    if( $next.length == 0 || $prev.length == 0 ){
        jQuery( '.post-navigation' ).addClass( 'single-navigator' );
    }


    if (jQuery().fstPopupSearch) {
        jQuery('.fansee-business-toggle-search').fstPopupSearch({
            labelText : FANSEE.search_label,
            action    : FANSEE.home_url
        });
    }

    if (jQuery().slick) {
        jQuery('.fansee-business-testimonial').slick();

        var slickArrLeft = `
            <div class="slick-prev fansee-business-arrow fansee-business-arrow-prev">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 511.991 511.991" style="enable-background:new 0 0 511.991 511.991;" xml:space="preserve" width="50px" height="50px"><g><g>
            <g>
              <path d="M153.433,255.991L381.037,18.033c4.063-4.26,3.917-11.01-0.333-15.083c-4.229-4.073-10.979-3.896-15.083,0.333    L130.954,248.616c-3.937,4.125-3.937,10.625,0,14.75L365.621,508.7c2.104,2.188,4.896,3.292,7.708,3.292    c2.646,0,5.313-0.979,7.375-2.958c4.25-4.073,4.396-10.823,0.333-15.083L153.433,255.991z" data-original="#000000" class="active-path" data-old_color="#000000" />
            </g>
            </g></g> </svg>
          </div>`;
        var slickArrRight = `
          <div class="slick-prev fansee-business-arrow fansee-business-arrow-next">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 511.995 511.995" style="enable-background:new 0 0 511.995 511.995;" xml:space="preserve" width="50px" height="50px"><g><g>
            <g>
              <path d="M381.039,248.62L146.373,3.287c-4.083-4.229-10.833-4.417-15.083-0.333c-4.25,4.073-4.396,10.823-0.333,15.083    L358.56,255.995L130.956,493.954c-4.063,4.26-3.917,11.01,0.333,15.083c2.063,1.979,4.729,2.958,7.375,2.958    c2.813,0,5.604-1.104,7.708-3.292L381.039,263.37C384.977,259.245,384.977,252.745,381.039,248.62z" data-original="#000000" class="active-path" data-old_color="#000000" />
            </g>
            </g></g> </svg>
          </div>`;
          
        jQuery('.fansee-business-feature-slider-init').slick({
            prevArrow: slickArrLeft,
            nextArrow: slickArrRight,
        });
    }

    if (jQuery().fstMmenu) {
        jQuery('.primary-menu-wrapper').fstMmenu();
    }
});

jQuery(window).load(function(){
    jQuery("#loader-wrapper").fadeOut(1000);
    jQuery("#loaded").fadeOut(400);
});

jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 500) {
        jQuery('.scroll-to-top').fadeIn(200);
    } else {
        jQuery('.scroll-to-top').fadeOut(200);
    }
});