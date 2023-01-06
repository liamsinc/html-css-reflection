// Import class(es):
import { Functions } from "./Functions.js";

// Instantiate instance of imported class(es):
const util = new Functions();

// Single element selectors:

const SIDE_MENU = util.SIDE_MENU;
const OVERLAY = util.OVERLAY;
const SIDE_MENU_BTN = '.header__menu-btn';
const AWARD_CAROUSEL = '.accolades__wrapper';
const HERO_CAROUSEL = '.hero__carousel';

// Multi element selectors:

const HTML_BODY = util.HTML_BODY;
const SIDE_MENU_LINKS = util.SIDE_MENU_LINKS;

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
    if (util.checkPage()) {
        util.intializeCarousel(HERO_CAROUSEL);
        util.intializeCarousel(AWARD_CAROUSEL);
    }
    
    // Initialize the cookie popup:
    util.initializeCookies(COOKIE_SETTINGS);
});

// Call relevant methods when the menu button is clicked:
$(SIDE_MENU_BTN).on('click', function () {
    util.toggleClass(this);
    util.toggleSideMenu();
    if (util.checkPage()) {
        util.toggleCarousel(HERO_CAROUSEL);
    }
});

// Call relevant methods when a link within the side menu is clicked:
$(SIDE_MENU_LINKS).on('click', function () {
    util.toggleClass(SIDE_MENU_BTN);
    util.toggleSideMenu();
    if (util.checkPage()) {
        util.toggleCarousel(HERO_CAROUSEL);
    }
});

// Call the toggleStickyHeader method when scrolling is detected:
$(window).on('scroll', function () {
    util.toggleStickyHeader()
});

// Call relevant methods when window resizing is detected:
$(window).on('resize', function () {
    util.scrollOnBreakpoint(SIDE_MENU, 2); 
    util.calcMainContentWidth();
});

// Call relevant methods when the overlay is clicked:
$(OVERLAY).on('click', function () {
    util.toggleClass(SIDE_MENU_BTN);
    util.toggleSideMenu();
    if (util.checkPage()) {
        util.toggleCarousel(HERO_CAROUSEL);
    }
});
