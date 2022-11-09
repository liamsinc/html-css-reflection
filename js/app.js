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

// JQuery helper constants:

const $style = 'style';
const $visible = ':visible';
const $hidden = ':hidden';
const $stickyClass = 'sticky__wrapper';
const $hamburgerClass = 'is-active';

// General constants: 

const smallMenuWidth = 275;
const largeMenuWidth = 350;
const largeBreakpoint = 991;

// CSS Objects

const disableScroll = {
    overflow: 'hidden',
    height: '100%' 
};
const stickyHero = { marginTop: '210px' };
const stickyContainer = { marginLeft: '10px' };

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
        if (windowWidth < largeBreakpoint) {
            mainContentWidth = windowWidth - smallMenuWidth;
            $($mainContent).css({width: mainContentWidth});
        } else {
            mainContentWidth = windowWidth - largeMenuWidth;
            $($mainContent).css({width: mainContentWidth});
        }    
    } else {
        $($mainContent).removeAttr($style);
    }
}

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
}

// Function which toggles the side menu and calls a function:

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

function toggleHamburger() {
    if (!$($menuButton).hasClass($hamburgerClass)) {
        $($menuButton).addClass($hamburgerClass);
    } else {
        $($menuButton).removeClass($hamburgerClass);
    }
}

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
// UTILITY
// ----------------------------------------------------------------

$(window).on('resize', calculateMainContentWidth);

