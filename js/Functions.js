export class Functions
{   
    // PROPERTIES --------------------------------------------------------------------------------

    // Single element selectors:
    #MAIN_CONTENT = '.main__content';
    #CONTAINER = '.container';
    #HEADER = '.header__wrapper';
    SIDE_MENU_LINKS = '.sidemenu__service-item > ul > a > li, \
        .sidemenu__service-wrapper, \
        .sidemenu__service-item, \
        .sidemenu__main, \
        .sidemenu__item, \
        .sidemenu__button'
    ;
    HTML_BODY = 'html, body';
    INFO_DROPDOWN = '.info__dropdown';
    SIDE_MENU = '.sidemenu';
    OVERLAY = '.overlay';
    
    // CSS class names:
    #STICKY = 'sticky__wrapper';
    #HAMBURGER = 'is-active';

    // Arrays:
    #BREAKPOINTS = [576, 767, 991, 1259];
    #MENU_WIDTHS = [275, 350];

    // CSS rule object(s):
    #NO_SCROLL = {height: '100vh', overflow: 'auto'};
    #DISPLAY_BLOCK = {display: 'block'};
    #LEFT_MARGIN = {marginLeft: '10px'};

    // Property holding window Y position:
    yPos = window.scrollY;

    // Slick carousel setting object(s):
    heroSettings = {
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

    awardSettings = {
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        pauseOnFocus: false,
        arrows: false,
        centerPadding: true,
        mobileFirst: true,
        responsive: [
            {breakpoint: this.#BREAKPOINTS[0], settings: { slidesToShow: 2 }},
            {breakpoint: this.#BREAKPOINTS[1], settings: { slidesToShow: 3 }},
            {breakpoint: this.#BREAKPOINTS[2], settings: { slidesToShow: 4 }},
            {breakpoint: this.#BREAKPOINTS[3], settings: { slidesToShow: 5 }},
        ]
    };

    // METHODS --------------------------------------------------------------------------------

    /**
     * Checks if the current page is the homepage.
     * Used to prevent certain carousel functions from running on pages where carousels are not present.
     * @returns {boolean} - true if currently on the homepage, false if not.
     */
    checkPage() {
        let currentLoc = $(location).attr('href');
        if(currentLoc.endsWith("index.php") || currentLoc.endsWith("index.php#")) {
            return true;
        } else {
            return false;
        }
    };

    /**
     * Calculates and sets the width of the main content.
     * Called when the side menu is toggled or the window is resized.
     */
    calcMainContentWidth() {
        if ($(this.SIDE_MENU).is(':visible')) {
            let windowWidth = $(window).width();
            let widthToApply = 0;
    
            if (windowWidth < this.#BREAKPOINTS[2]) {
                widthToApply = windowWidth - this.#MENU_WIDTHS[0];
                $(this.#MAIN_CONTENT).css({width: widthToApply});
            } else {
                widthToApply = windowWidth - this.#MENU_WIDTHS[1];
                $(this.#MAIN_CONTENT).css({width: widthToApply});
            }
        } else {
            $(this.#MAIN_CONTENT).removeAttr('style');
        }
    };

    /**
     * Opens or closes the side menu.
     * Invokes the calcMainContentWidth() method.
     */
    toggleSideMenu() {
        if ($(this.SIDE_MENU).is(':hidden')) {
            $(this.SIDE_MENU).show().scrollTop(0);
            $(this.OVERLAY).css(this.#DISPLAY_BLOCK);
            $(this.#MAIN_CONTENT).css(this.#NO_SCROLL).scrollTop(this.yPos);
            $(this.#CONTAINER).css(this.#LEFT_MARGIN);
        } else {
            $(this.SIDE_MENU).hide();
            $(this.OVERLAY).removeAttr('style');
            $(this.#CONTAINER).removeAttr('style');
        }
    
        this.calcMainContentWidth();
    };

    /**
     * Takes an element and starts the slick carousel.
     * Applies the relevant slick settings based on the parameter value.
     * @param {string} element - the element selector as a string. 
     */
    intializeCarousel(element) {
        if (element === '.hero__carousel') {
            $(element).slick(this.heroSettings);
        } else {
            $(element).slick(this.awardSettings);
        }
    };

    /**
     * Activates or deactivates the sticky header.
     * Toggles based on scroll direction and only when more than 10 pixels of scroll is detected.
     */
    toggleStickyHeader() {
        let currentYPos = window.scrollY;
    
        if(currentYPos === 0 || (this.yPos + 10) < currentYPos){
            $(this.#HEADER).removeClass(this.#STICKY);
        } else if ((this.yPos - 10) > currentYPos) {
            $(this.#HEADER).addClass(this.#STICKY);
        }
        
        this.yPos = currentYPos;
    };

    /**
     * Private method invoked only by the toggleCarousel method.
     * Pauses or unpauses autoplay on the given carousel element.
     * @param {string} element - The element selector as a string.
     * @param {object} settings - The slick settings object to update.
     */
    #updateCarousel(element, settings) {
        if (settings.autoplay === true) {
            settings.autoplay = false;
            $(element).slick('slickPause');
        } else {
            settings.autoplay = true;
            $(element).slick('slickPlay');
        }
    };

    /**
     * Determines which carousel is being targeted, then calls the #updateCarousel method.
     * Passes in the relevant slick settings object based on the element.
     * @param {string} element - The element selector as a string 
     */
    toggleCarousel(element) {
        if (element === '.hero__carousel') {
            this.#updateCarousel(element, this.heroSettings);
        } else {
            this.#updateCarousel(element, this.awardSettings);
        }
    };

    /**
     * Removes a given class from an element if said element already possesses the class.
     * If the element does not already possess the class, apply that class to the element.
     * @param {string} element - The element selector as a string.
     * @param {string} className - The name of the class to toggle as a string. Default is #HAMBURGER.
     */
    toggleClass(element, className = this.#HAMBURGER) {
        if ($(element).hasClass(className)) {
            $(element).removeClass(className);
        } else {
            $(element).addClass(className); 
        }
    };

    /**
     * Scrolls to the top of a given element if the window width is within a given range.
     * @param {string} element - the element selector passed as a string.
     * @param {number} index - the index of the #BREAKPOINTS array value.
     */
    scrollOnBreakpoint(element, index) {
        let windowWidth = $(window).width();
        let largeBreakLower = this.#BREAKPOINTS[index] - 10;
        let largeBreakUpper = this.#BREAKPOINTS[index] + 10;
        
        if (windowWidth >= largeBreakLower && windowWidth <= largeBreakUpper) {
            $(element).scrollTop(0);
        }
    };

    /**
     * Initializes the cookie plugin with given settings. 
     * @param {object} settings - The cookie settings passed as an object.
     */
    initializeCookies(settings) {
        window.start.init(settings);
    };

    /**
     * Strips HTML tags from a string.
     * @param {array} arr - An array containing the strings to strip HTML tags from.
     * @returns {array} - An array containing the cleaned strings.
     */
    stripTags (arr) {
        let cleaned = [];
        for (let i = 0; i < arr.length; i++) {
            cleaned.push(arr[i].replace(/(<([^>]+)>)/gi, ""));
        }
        return cleaned;
    };

    /**
     * Toggles the div containing out of hours support information.
     */
    toggleDropdown() {
        if ($(this.INFO_DROPDOWN).is(':visible')) {
            $(this.INFO_DROPDOWN).slideUp();
        } else {
            $(this.INFO_DROPDOWN).slideDown();
        }
    };

    /**
     * For now, identifies which form field was invalid and prints this to the console.
     * @param {array} arr - The array containing the index(s) of invalid fields.
     */
    formErrors(arr) {
        for (let i = 0; i < arr.length; i++) {
            switch(arr[i]) {
                case 0:
                    console.log("Name invalid!");
                    break;
                case 1:
                    console.log("Email invalid!");
                    break;
                case 2:
                    console.log("Phone invalid!");
                    break;
                case 3:
                    console.log("Subject invalid!");
                    break;
                case 4:
                    console.log("Message invalid!");
                    break;
                case 5:
                    console.log("Marketing invalid!");
                    break;
                default:
                    console.log("Default case reached!");
                    break;
            }
        }
    };

    /**
     * Gets the value of an element and returns it to the caller. Used for form fields.
     * Additionally normalises the result from the checkbox input.
     * @param {string} element - The element selector as a string.
     * @returns {string} - The value of the selected element.
     */
    getValueOf(element) {
        if (element === '#checkbox-2:checked') {
            if ($(element).val() === undefined) {
                return 'false';
            } else {
                return 'true';
            }
        } else {
            return $(element).val().trim();
        }
    };
};