// ---------------------------------------------------------------------------------------------------------------
// GLOBAL CONSTANTS
// ---------------------------------------------------------------------------------------------------------------

// JQuery single-element selectors:

const $sideMenu = '.sidemenu';
const $mainContent = '.main__content';
const $menuButton = '.header__menu-btn';
const $container = '.container';
const $headerWrapper = '.header__wrapper';
const $heroSection = '.hero-section';
const $awardsCarousel = '.accolades__wrapper';
const $heroCarousel = '.hero__carousel';
const $overlay = '.overlay';

//Jquery multi-element selectors:

const $htmlBody = 'html, body';
const $sideMenuLinks = '.sidemenu__service-item > ul > a > li, \
                        .sidemenu__service-wrapper, \
                        .sidemenu__service-item, \
                        .sidemenu__main, \
                        .sidemenu__item, \
                        .sidemenu__button'
;

// JQuery helpers: 

const $style = 'style';
const $visible = ':visible';
const $hidden = ':hidden';

// CSS class references:

const stickyHeaderClass = 'sticky__wrapper';
const hamburgerActiveClass = 'is-active';

// Holds the two different widths the side menu can be:

const smallMenuWidth = 275;
const largeMenuWidth = 350;

// Array holding the values of the breakpoints:

const breakpoints = [
    576, 767, 991, 1259
];

// Hero section margin adjustments:
// const stickyHeroSmall = { marginTop: '110px' };
// const stickyHeroMedium = { marginTop: '170px' }; 
// const stickyHeroLarge = { marginTop: '210px' };

// Main content margin adjustment:
const stickyContainer = { marginLeft: '10px' };

// Rules to disable scrolling:
const disableScroll = {
    height: '100vh',
    overflow: 'auto'
};

// Cookie plugin settings:
const cookieSettings = {
    Palette:"palette6",
    Mode:"banner bottom",
    Time:"1"
};

// ---------------------------------------------------------------------------------------------------------------
// SLICK CAROUSEL SETTINGS
// ---------------------------------------------------------------------------------------------------------------

// Awards/accolades carousel settings:
let slickAwardSettings = {
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    pauseOnFocus: false,
    arrows: false,
    centerPadding: true,
    mobileFirst: true,
    responsive: [
        {breakpoint: breakpoints[0], settings: { slidesToShow: 2 }},
        {breakpoint: breakpoints[1], settings: { slidesToShow: 3 }},
        {breakpoint: breakpoints[2], settings: { slidesToShow: 4 }},
        {breakpoint: breakpoints[3], settings: { slidesToShow: 5 }},
    ]
};

// Hero carousel settings:
let slickHeroSettings = {
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    pauseOnFocus: false,
    autoplaySpeed: 4000,
    arrows: false,
    dots: true,
    speed: 300,
    mobileFirst: true
};

// ---------------------------------------------------------------------------------------------------------------
// GLOBAL VARIABLES
// ---------------------------------------------------------------------------------------------------------------

// Holds the y position of the page:
let oldYPos = window.scrollY;

let savedYPos;

// ---------------------------------------------------------------------------------------------------------------
// FUNCTIONS
// ---------------------------------------------------------------------------------------------------------------

/*
calcMainContentWidth() calculates the width of the main content.

It is invoked when the side menu is toggled and when the window is resized. 

Implemented to support the functionality of the side menu.
*/

function calcMainContentWidth() {
    // Initial check: ensure the side menu is visible
    if ($($sideMenu).is($visible)) {
        // Grab the current window width and initialize a local variable.
        let windowWidth = $(window).width();
        let widthToApply = 0;

        // Check if what side of the large breakpoint we are on:
        if (windowWidth < breakpoints[2]) {
            // If below 991px, use the smallMenuWidth to calculate widthToApply:
            widthToApply = windowWidth - smallMenuWidth;
            $($mainContent).css({width: widthToApply});
        } else {
            // Else use the largeMenuWidth:
            widthToApply = windowWidth - largeMenuWidth;
            $($mainContent).css({width: widthToApply});
        }

    } else {
        // Reset the main content styles if the side menu is hidden:
        $($mainContent).removeAttr($style);
    }
};

// ---------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------

/*
toggleStickyHeader() is invoked whenever a scroll event is fired.

It checks to see if the current y position is 0 (the user is at 
the top of the page), or if the old y position + 10 is less than the 
current y position (indicating the user has scrolled down).

In both these cases we remove the sticky styles/adjustments from the hero
section and the header.

If the check returns false, check if old y position - 10 is greater than
current y position (indicating the user has scrolled up and IS NOT 
at the top of the page), and if true, apply the sticky class
to the header.

I check the old y position +/- 10 in order to stop the header from
flickering on touchscreen devices.

Finally assign currentYPos to the global variable oldYPos ready for re-evaulation.
*/

function toggleStickyHeader() {
    // Grab the current y position and window width:
    let currentYPos = window.scrollY;

    // Run checks and toggle sticky rules:
    if(currentYPos === 0 || (oldYPos + 10) < currentYPos){
        // $($heroSection).removeAttr($style);
        $($headerWrapper).removeClass(stickyHeaderClass);
    } else if ((oldYPos - 10) > currentYPos) {
        $($headerWrapper).addClass(stickyHeaderClass);
        // adjustHeroSection();
    }

    // Assign the current y position to the global variable, ready for re-evaluation: 
    oldYPos = currentYPos;
};

// ---------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------

/*
toggleSideMenu() is invoked when the menu button (or a link inside of it) is clicked.

If the side menu is hidden, display the side menu (and scroll to the top of it), 
disable scrolling on the main page and adjust the left margin of the container class.

If side menu is visible, hide it, re-enable scrolling and remove the left 
margin adjustment.

Finally it invokes calcMainContentWidth() to adjust the width of the main content.
*/

function toggleSideMenu() {
    // Run the conditional and toggle side menu as appropriate:
    if ($($sideMenu).is($hidden)) {
        $($sideMenu).show().scrollTop(0);
        $($overlay).css({display: 'block'});
        $($mainContent).css(disableScroll).scrollTop(oldYPos);
        $($container).css(stickyContainer);
    } else {
        $($sideMenu).hide();
        $($overlay).removeAttr($style);
        $($container).removeAttr($style);
    }

    // Update the main content width:
    calcMainContentWidth();
};

// ---------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------

/*
toggleClass() is invoked when the menu button (or a link inside of it) is clicked. 
If the given element already has the supplied class, remove it. 
Else apply the supplied class to the given element.
*/

function toggleClass(element, className) {
    if ($(element).hasClass(className)) {
        $(element).removeClass(className);
    } else {
        $(element).addClass(className); 
    }
};

// ---------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------

/*
intializeCarousel() takes an jQuery element and a settings object.
It intializes the slick plugin on the given element using the 
supplied settings object.
*/

function intializeCarousel(element, settings) {
    $(element).slick(settings);
};

// ---------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------

// initializeCookies() takes a settings object and uses it to initialize the cookie popup.

function initializeCookies(settings) {
    window.start.init(settings);
};

// ---------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------

/*
scrollOnBreakpoint() scrolls to a y position (default = 0) of a
given element when the window width is within a range centered 
on the supplied breakpoint.
*/

function scrollOnBreakpoint(element, index, yPos = 0) {
    // Grab the current window width:
    let windowWidth = $(window).width();

    // Set the range based on the supplied breakpoint:
    let largeBreakLower = breakpoints[index] - 10;
    let largeBreakUpper = breakpoints[index] + 10;
    
    // Run the range check:
    if (windowWidth >= largeBreakLower && windowWidth <= largeBreakUpper) {
        // Scroll the given element to the supplied position:
        $(element).scrollTop(yPos);
    }
};

// ---------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------

/* 
toggleCarouselAutoplay() is invoked when the menu button (or a link inside of it) is clicked.
It checks the current state of the autoplay property then pauses or unpauses the carousel.
*/

function toggleCarouselAutoplay(element, settings) {
    if (settings.autoplay === true) {
        settings.autoplay = false;
        $(element).slick('slickPause');
    } else {
        settings.autoplay = true;
        $(element).slick('slickPlay');
    }
};

/* 
checkPage() returns true if the current location is the homepage.
Used to prevent certain carousel functions from running on pages where carousels are not present.
*/

function checkPage() {
    const currentLoc = $(location).attr('href');
    if(currentLoc.endsWith("index.php")) {
        return true;
    } else {
        return false;
    }
};

// ---------------------------------------------------------------------------------------------------------------
// END OF FUNCTIONS
// ---------------------------------------------------------------------------------------------------------------

// ---------------------------------------------------------------------------------------------------------------
// ON READY EVENT:
// ---------------------------------------------------------------------------------------------------------------

$(function () {
    // Scroll to the top of the page:
    $($htmlBody).scrollTop(0);
    
    //initialize the carousels:
    if (checkPage()) {
        intializeCarousel($heroCarousel, slickHeroSettings);
        intializeCarousel($awardsCarousel, slickAwardSettings);
    }
    
    //initialize the cookies:
    initializeCookies(cookieSettings);
});

// ---------------------------------------------------------------------------------------------------------------
// EVENT HANDLERS:
// ---------------------------------------------------------------------------------------------------------------

// Invoke some functions when the menu button is clicked:
$($menuButton).on('click', function () {
    oldYPos = $(window).scrollTop();
    toggleClass(this, hamburgerActiveClass);
    toggleSideMenu();
    if (checkPage()) {
        toggleCarouselAutoplay($heroCarousel, slickHeroSettings);
    }
    
});

// Invoke some functions when a link inside the side menu is clicked:
$($sideMenuLinks).on('click', function () {
    toggleClass($menuButton, hamburgerActiveClass);
    toggleSideMenu();
    if (checkPage()) {
        toggleCarouselAutoplay($heroCarousel, slickHeroSettings);
    }
});

// Invoke toggleStickyHeader() when scroll event is triggered:
$(window).on('scroll', toggleStickyHeader);

// Invoke scrollOnBreakpoint() and calcMainContentWidth() when the browser window is resized:
$(window).on('resize', function () {
    scrollOnBreakpoint($sideMenu, 2); 
    calcMainContentWidth();
});

// When the overlay is clicked, close the side menu:
$($overlay).on('click', function () {
    toggleClass($menuButton, hamburgerActiveClass);
    toggleSideMenu();
    if (checkPage()) {
        toggleCarouselAutoplay($heroCarousel, slickHeroSettings);
    }
});
