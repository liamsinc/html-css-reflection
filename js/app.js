// -------------------------------------------------------------------------------
// Side Menu
// -------------------------------------------------------------------------------
const enableScroll = {
    overflow: 'auto',
    height: 'auto' 
}

const disableScroll = {
    overflow: 'hidden',
    height: '100%' 
}


$('.header__menu-btn').on('click', function() {
    if ($('.sidemenu').is(':hidden')) {
        $('.sidemenu').show();
        $('.container').css({marginLeft: '16px'})
        $('html, body').css(disableScroll);
    } else {
        $('.sidemenu').hide();
        $('.container').css({marginLeft: 'auto'})
        $('html, body').css(enableScroll);
    } 
});

// -------------------------------------------------------------------------------
// Sticky Header
// -------------------------------------------------------------------------------

let oldScrollY = window.scrollY;

const stickyHeroStyles = {
    marginTop: '210px'
}

const heroStyles = {
    marginTop: '0px'
}

function toggleStickyHeader() {
    $('.header__wrapper').removeAttr('style');
    if(window.scrollY === 0 || oldScrollY < window.scrollY){
        $('.hero-section').css(heroStyles);
        $('.header__wrapper').removeClass('sticky__wrapper');
    } else {
        $('.hero-section').css(stickyHeroStyles);
        $('.header__wrapper').addClass('sticky__wrapper');
    }
    oldScrollY = window.scrollY;
}

$(window).on('scroll', toggleStickyHeader);

