// Get IE or Edge browser version
var version = detectIE();

if (version === false) {
   // document.getElementById('result').innerHTML = '<s>IE/Edge</s>';
   AOS.init();
   $('.parallax-window').parallax();
} else if (version >= 12) {
   // document.getElementById('result').innerHTML = 'Edge ' + version;
   AOS.init();
} else {
   // document.getElementById('result').innerHTML = 'IE ' + version;
}

// add details to debug result
// document.getElementById('details').innerHTML = window.navigator.userAgent;

/**
 * detect IE
 * returns version of IE or false, if browser is not Internet Explorer
 */
function detectIE() {
   var ua = window.navigator.userAgent;

   // Test values; Uncomment to check result …

   // IE 10
   // ua = 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)';

   // IE 11
   // ua = 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko';

   // Edge 12 (Spartan)
   // ua = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36 Edge/12.0';

   // Edge 13
   // ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586';

   var msie = ua.indexOf('MSIE ');
   if (msie > 0) {
      // IE 10 or older => return version number
      return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
   }

   var trident = ua.indexOf('Trident/');
   if (trident > 0) {
      // IE 11 => return version number
      var rv = ua.indexOf('rv:');
      return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
   }

   var edge = ua.indexOf('Edge/');
   if (edge > 0) {
      // Edge (IE 12+) => return version number
      return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
   }

   // other browser
   return false;
}



// For Material Design Form
function checkValue(element) {
   // check if the input has any value (if we've typed into it)
   if ($(element).val()) $(element).addClass('has-value');
   else $(element).removeClass('has-value');
}

$(function () {
	
	$('[data-toggle="tooltip"]').tooltip();

   // Navigate to Application Tabs from another page
   // Javascript to enable link to tab
   let url = location.href.replace(/\/$/, "");

   if (location.hash) {
      const hash = url.split("#");
      $('#applicationNav a[href="#' + hash[1] + '"]').tab("show");
      url = location.href.replace(/\/#/, "#");
      history.replaceState(null, null, url);
      setTimeout(function () {
         $(window).scrollTop(0);
         $('#site-navigation').removeClass('darkMenu');
      }, 400);

   }

   $('a[data-toggle="tab"]').on("click", function () {
      let newUrl;
      const hash = $(this).attr("href");
      if (hash == "#home") {
         newUrl = url.split("#")[0];
      } else {
         newUrl = url.split("#")[0] + hash;
      }
      newUrl += "/";
      history.replaceState(null, null, newUrl);
   });

   jQuery('img.svg').each(function () {
      var $img = jQuery(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');

      jQuery.get(imgURL, function (data) {
         // Get the SVG tag, ignore the rest
         var $svg = jQuery(data).find('svg');

         // Add replaced image's ID to the new SVG
         if (typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
         }
         // Add replaced image's classes to the new SVG
         if (typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass + ' replaced-svg');
         }

         // Remove any invalid XML tags as per http://validator.w3.org
         $svg = $svg.removeAttr('xmlns:a');

         // Check if the viewport is set, else we gonna set it if we can.
         if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
         }

         // Replace image with new SVG
         $img.replaceWith($svg);

      }, 'xml');

   });


   // Run on page load for Material Design Form
   $('form.md .form-control').each(function () {
      checkValue(this);
   });
   // Run on input exit for Material Design Form
   $('form.md .form-control').blur(function () {
      checkValue(this);
   });

   //Mobile Navbar Toggler Annimation
   var $navbarToggler = $('.offcanvas-menu-toggle');
   $navbarToggler.click(function () {
      $(this).toggleClass('open');
   });
   $('.site-overlay').click(function () {
      $navbarToggler.toggleClass('open');
   });

   //Smoothe Scroll
   // Select all links with hashes
   $('a.anchor[href*="#"]')
      // Remove links that don't actually link to anything
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function (event) {
         // On-page links
         if (
            location.pathname.replace(/^\//, '') ==
            this.pathname.replace(/^\//, '') &&
            location.hostname == this.hostname
         ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ?
               target :
               $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
               // Only prevent default if animation is actually gonna happen
               event.preventDefault();
               $('html, body').animate({
                     scrollTop: target.offset().top - 64
                  },
                  500,
                  function () {
                     // Callback after animation
                     // Must change focus!
                     var $target = $(target);
                     $target.focus();
                     if ($target.is(':focus')) {
                        // Checking if the target was focused
                        return false;
                     } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                     }
                  }
               );
            }
         }
      });

   var c,
      currentScrollTop = 0,
      navbar = $('#site-navigation');

   $(window).scroll(function () {
      var a = $(window).scrollTop();
      var b = navbar.outerHeight();
      var extra = 5;

      if (currentScrollTop >= b + extra) {
         navbar.addClass('darkMenu');
      } else {
         navbar.removeClass('darkMenu');
      }

      currentScrollTop = a;

      // if (c < currentScrollTop && a > b + b) {
      //    navbar.addClass('scrollUp');
      // } else if (c > currentScrollTop && !(a <= b)) {
      //    navbar.removeClass('scrollUp');
      // }
      c = currentScrollTop;
   });

   // Offset Padding on Tablet Navigation based on height of header
   // $("#mainContent").css({ "padding-top": $("#headerWrapper").height() });
   // When link in submenu is active force open parent dropdown menu
   $('.pushy-link.active')
      .parents('.pushy-submenu')
      .addClass('pushy-submenu-open');
   $('.dropdown-menu li.active')
      .parent()
      .addClass('show')
      .closest('li')
      .addClass('show');

   //Widnow Resize
   $(window).resize(function () {
      var viewportWidth = $(window).width();
      if (viewportWidth > 750) {
         $('body').removeClass('pushy-open-left');
         if (!$('body').hasClass('test')) {
            $('.offcanvas-menu-toggle').removeClass('open');
         }
      }
      // $("#mainContent").css({ "padding-top": $("#headerWrapper").height() });
   });



   // Auto expanding TextArea
   var autoExpand = function (field) {
      // Reset field height
      field.style.height = 'inherit';
      // Get the computed styles for the element
      var computed = window.getComputedStyle(field);
      // Calculate the height
      var height =
         parseInt(computed.getPropertyValue('border-top-width'), 10) +
         parseInt(computed.getPropertyValue('padding-top'), 10) +
         field.scrollHeight +
         parseInt(computed.getPropertyValue('padding-bottom'), 10) +
         parseInt(computed.getPropertyValue('border-bottom-width'), 10);
      field.style.height = height + 'px';
   };
   document.addEventListener(
      'input',
      function (event) {
         if (event.target.tagName.toLowerCase() !== 'textarea') return;
         autoExpand(event.target);
      },
      false
   );
});