// -------------------------------------------------------------------------------
// Side Menu
// -------------------------------------------------------------------------------

$('.header__menu-btn').on('click', function() {
    if ($('.sidemenu').is(':hidden')) {
        $('.sidemenu').show();
        $('.container').css({marginLeft: '16px'})
    } else {
        $('.sidemenu').hide();
        $('.container').css({marginLeft: 'auto'})
    } 
});

// -------------------------------------------------------------------------------
// Sticky Header
// -------------------------------------------------------------------------------

let oldScrollY = window.scrollY;

const stickyHeaderStyles = {
    position: 'fixed',
    top: 0,
    left: 0,
    right: 0,
    width: '100%',
}

const headerStyles = {
    position: 'static',
}

const stickyHeroStyles = {
    marginTop: '210px'
}

const heroStyles = {
    marginTop: '0px'
}

function toggleStickyHeader() {
    if(oldScrollY < window.scrollY){
        $('.hero-section').css(heroStyles);
        $('.header__wrapper').css(headerStyles);
    } else {
        $('.hero-section').css(stickyHeroStyles);
        $('.header__wrapper').css(stickyHeaderStyles);
    }
    oldScrollY = window.scrollY;
}

$(window).on('scroll', toggleStickyHeader);

