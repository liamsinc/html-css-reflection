export class Validation
{   
    #emailRegex = /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/; 
    #phoneCharRegex = /^[\d \-()]*$/;
    #phoneFormatRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;

    inputExists(input) {
        if (input === '') {
            return false;
        } else {
            return true;
        }
    }

    inputLength(input) {
        if (input.length > 100) {
            return false;
        } else {
            return true;
        }
    }

    email(email) {
        if (email === '') {
            return false;
        } else if (!email.match(this.#emailRegex)) {
            return false;
        } else {
            return true;
        }
    }

    phone(phone) {
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