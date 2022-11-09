// ----------------------------------------------------------------
// VARIABLES AND CONSTANTS
// ----------------------------------------------------------------

// JQuery selectors stored in constants:

const $sideMenu = '.sidemenu';
const $mainContent = '.main__content';
const $menuButton = '.header__menu-btn';
const $htmlBody = 'html, body';
const $container = '.container';
const $headerWrapper = '.header__wrapper';
const $heroSection = '.hero-section';
const $accolades = '.accolades-wrapper';

// JQuery helper constants:

const $style = 'style';
const $visible = ':visible';
const $hidden = ':hidden';
const $stickyClass = 'sticky__wrapper';
const $hamburgerClass = 'is-active';

// General constants: 

const smallMenuWidth = 275;
const largeMenuWidth = 350;

// Breakpoint array:

const breakpoints = [
    576,
    767,
    991,
    1259
];

// CSS objects:

const stickyHero = { marginTop: '210px' };
const stickyContainer = { marginLeft: '10px' };
const disableScroll = {
    overflow: 'hidden',
    height: '100%' 
};

// Variable which holds the y position of the page:

let oldScrollY = window.scrollY;

// Variable used for storing the calculated main content width:

let mainContentWidth;

// ----------------------------------------------------------------
// FUNCTIONS
// ----------------------------------------------------------------

// Function which calculates how wide the main content should be:

function calculateMainContentWidth() {
    let windowWidth = $(window).width();
    if ($($sideMenu).is($visible)) {
        if (windowWidth < breakpoints[2]) {
            mainContentWidth = windowWidth - smallMenuWidth;
            $($mainContent).css({width: mainContentWidth});
        } else {
            mainContentWidth = windowWidth - largeMenuWidth;
            $($mainContent).css({width: mainContentWidth});
        }    
    } else {
        $($mainContent).removeAttr($style);
    }
};

// Function which toggles the sticky header:

function toggleStickyHeader() {
    $($headerWrapper).removeAttr($style);
    let currentScrollY = window.scrollY;
    if(currentScrollY === 0 || oldScrollY < currentScrollY){
        $($heroSection).removeAttr($style);
        $($headerWrapper).removeClass($stickyClass);
    } else {
        $($heroSection).css(stickyHero);
        $($headerWrapper).addClass($stickyClass);
    }
    oldScrollY = currentScrollY;
};

// Function which toggles the side menu and calls calculateMainContentWidth:

function toggleSideMenu() {
    if ($($sideMenu).is($hidden)) {
        $($sideMenu).show().scrollTop(0);
        $($htmlBody).css(disableScroll);
        $($container).css(stickyContainer);
    } else {
        $($sideMenu).hide();
        $($htmlBody).removeAttr($style);
        $($container).removeAttr($style);
    }
    calculateMainContentWidth();
}

// Function which toggles the hamburger animation:

function toggleHamburger() {
    if (!$($menuButton).hasClass($hamburgerClass)) {
        $($menuButton).addClass($hamburgerClass);
    } else {
        $($menuButton).removeClass($hamburgerClass);
    }
};

// Function that initialises the accolades carousel:

function intializeCarousel() {
    $($accolades).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        centerPadding: true,
        centerMode: true,
        mobileFirst: true,
        responsive: [
            {
                breakpoint: breakpoints[0],
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: breakpoints[1],
                settings: { slidesToShow: 3 }
            },
            {
                breakpoint: breakpoints[2],
                settings: { slidesToShow: 4 }
            },
            {
                breakpoint: breakpoints[3],
                settings: { slidesToShow: 5 }
            },
        ]
    });
};

// -------------------------------------------------------------------------------
// SIDE MENU
// -------------------------------------------------------------------------------

$($menuButton).on('click', function () {
    toggleHamburger();
    toggleSideMenu();
});

// -------------------------------------------------------------------------------
// STICKY HEADER
// -------------------------------------------------------------------------------

$(window).on('scroll', toggleStickyHeader);

// ----------------------------------------------------------------
// ACCOLADES CAROUSEL
// ----------------------------------------------------------------

// Shorthand for on document load(ready event), initialise the carousel:
$(intializeCarousel);

// ----------------------------------------------------------------
// UTILITY
// ----------------------------------------------------------------

$(window).on('resize', calculateMainContentWidth);

