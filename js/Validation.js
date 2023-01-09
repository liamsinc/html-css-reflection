export class Validation
{   
    #emailRegex = /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/; 
    #phoneCharRegex = /^[\d \-()]*$/;
    #phoneFormatRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;

    /**
     * Checks that the input is not an empty string.
     * 
     * @param {string} input - The string to validate.
     * @returns {boolean} - True or false.
     */
    inputExists(input) 
    {
        if (input === '') {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Checks that the input does not exceed 100 characters.
     * 
     * @param {string} input - The string to validate.
     * @returns {boolean} - True or false
     */
    inputLength(input) 
    {
        if (input.length > 100) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Checks that the email input is not empty and conforms to REGEX rule.
     * 
     * @param {string} email - The string to validate.
     * @returns {boolean} - True or false.
     */
    email(email) 
    {
        if (email === '') {
            return false;
        } else if (!email.match(this.#emailRegex)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Checks that the phone input is not empty and confroms to REGEX rules.
     * 
     * @param {string} phone - The string to validate.
     * @returns {boolean} - True or false.
     */
    phone(phone) 
    {
        if (phone === '') {
            return false;
        } else if (!phone.match(this.#phoneCharRegex)) {
            return false;
        } else if (!phone.match(this.#phoneFormatRegex)) {
            return false;
        } else {
            return true;
        }
    }
}