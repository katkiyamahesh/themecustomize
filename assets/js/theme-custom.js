/**
 * theme frontend JS file.
 *
 */


/**
* Scroll to top button.
*/

document.addEventListener(
    'DOMContentLoaded',
    function() {

function scrollToTop() {
            var scrollToTopButton = document.getElementById( 'scroll-to-top' );

            /* Only proceed when the button is present. */
            if ( scrollToTopButton ) {

                /* On scroll and show and hide button. */
                window.addEventListener(
                    'scroll',
                    function() {
                        if ( 500 < window.scrollY ) {
                            scrollToTopButton.classList.add( 'scroll-to-top--show' );
                        } else if ( 500 > window.scrollY ) {
                            scrollToTopButton.classList.remove(
                                'scroll-to-top--show'
                            );
                        }
                    }
                );

                /* Scroll to top when clicked on button. */
                scrollToTopButton.addEventListener(
                    'click',
                    function( e ) {
                        e.preventDefault(); 

                        /* Only scroll to top if we are not in top */
                        if ( 0 !== window.scrollY ) {
                            window.scrollTo(
                                {
                                    top: 0,
                                    behavior: 'smooth'
                                }
                            );
                        }
                    }
                );
            }
        }

        scrollToTop();

        }
        );