// Import class(es):
import { Functions } from "./Functions.js";

// Instantiate instance of imported class(es):
const Utility = new Functions();

// Single element selectors:

const SIDE_MENU = Utility.SIDE_MENU;
const OVERLAY = Utility.OVERLAY;
const SIDE_MENU_BTN = '.header__menu-btn';
const AWARD_CAROUSEL = '.accolades__wrapper';
const HERO_CAROUSEL = '.hero__carousel';
const WINDOW = window;

// Multi element selectors:

const HTML_BODY = 'html, body';
const SIDE_MENU_LINKS = '.sidemenu__service-item > ul > a > li, \
    .sidemenu__service-wrapper, \
    .sidemenu__service-item, \
    .sidemenu__main, \
    .sidemenu__item, \
    .sidemenu__button'
;

// Cookie plugin settings:
const COOKIE_SETTINGS = {
    Palette:"palette6",
    Mode:"banner bottom",
    Time:"1"
};

// ---------------------------------------------------------------------------------------------------------------
// EVENT HANDLERS:
// ---------------------------------------------------------------------------------------------------------------

// Called on ready event (immediately):
$(function () {
    // Scroll to the top of the page:
    $(HTML_BODY).scrollTop(0);
    
    // Initialize the carousels:
    if (Utility.checkPage()) {
        Utility.intializeCarousel(HERO_CAROUSEL);
        Utility.intializeCarousel(AWARD_CAROUSEL);
    }
    
    // Initialize the cookie popup:
    Utility.initializeCookies(COOKIE_SETTINGS);
});

// Call relevant methods when the menu button is clicked:
$(SIDE_MENU_BTN).on('click', function () {
    Utility.toggleClass(this);
    Utility.toggleSideMenu();
    if (Utility.checkPage()) {
        Utility.toggleCarousel(HERO_CAROUSEL);
    }
});

// Call relevant methods when a link within the side menu is clicked:
$(SIDE_MENU_LINKS).on('click', function () {
    Utility.toggleClass(SIDE_MENU_BTN);
    Utility.toggleSideMenu();
    if (Utility.checkPage()) {
        Utility.toggleCarousel(HERO_CAROUSEL);
    }
});

// Call the toggleStickyHeader method when scrolling is detected:
$(WINDOW).on('scroll', function () {
    Utility.toggleStickyHeader()
});

// Call relevant methods when window resizing is detected:
$(WINDOW).on('resize', function () {
    Utility.scrollOnBreakpoint(SIDE_MENU, 2); 
    Utility.calcMainContentWidth();
});

// Call relevant methods when the overlay is clicked:
$(OVERLAY).on('click', function () {
    Utility.toggleClass(SIDE_MENU_BTN);
    Utility.toggleSideMenu();
    if (Utility.checkPage()) {
        Utility.toggleCarousel(HERO_CAROUSEL);
    }
});
