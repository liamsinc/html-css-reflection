//----------------------------------------------------------------------------------------------------------------
// CONTACT PAGE --------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

// Import class(es):
import { Validation } from "./Validation.js";
import { Functions } from "./Functions.js";

// Instantiate instances of imported class(es):
const Utility = new Functions();
const Validate = new Validation();

// Declare jquery constants
const FORM = '.form__form';
const INFO_DROPDOWN = Utility.INFO_DROPDOWN;
const INFO_BTN = '.info__btn';
const FORM_SUBMIT = '.form__button-2';
const $CHECKBOX = '#checkbox-2:checked';
const $NAME_INPUT = '#name';
const $COMPANY_INPUT = '#company';
const $EMAIL_INPUT = '#email';
const $PHONE_INPUT = '#phone';
const $SUBJECT_INPUT = '#subject';
const $MESSAGE_INPUT = '#message';
const $CHECKBOX_INPUT = '#checkbox-2-input';

// Immediately hide the information dropdown:
$($(INFO_DROPDOWN).hide());

$(INFO_BTN).on('click', function () {
    Utility.toggleDropdown();
});

$(FORM_SUBMIT).on('click', (event) => {
    // Prevent the default action:
    event.preventDefault();

    // Declare some empty arrays:
    let cleanInputs = [];
    let invalidFields = [];

    // Get the values from the form inputs:
    let name = $($NAME_INPUT).val().trim();
    let company = $($COMPANY_INPUT).val().trim();
    let email = $($EMAIL_INPUT).val().trim();
    let phone = $($PHONE_INPUT).val().trim();
    let subject = $($SUBJECT_INPUT).val().trim();
    let message = $($MESSAGE_INPUT).val().trim();
    let marketing = $($CHECKBOX).val();
    
    // Normalise the result from the checkbox input:
    if (marketing === undefined) {
        marketing = 'false';
    } else {
        marketing = 'true';
    }

    // Purification ------------------------------------------------------------------------------------------
    
    // Store the dirty values in an array:
    let dirtyInputs = [name, company, email, phone, subject, message, marketing];
    
    // Call stripTags() on each value, then push the result to the cleanInputs array:
    for (let i = 0; i < dirtyInputs.length; i++) {
        let dirtyInput = dirtyInputs[i];
        let cleanInput = Utility.stripTags(dirtyInput);
        cleanInputs.push(cleanInput);
    }

    // Validation ------------------------------------------------------------------------------------------

    // Declare variables for every required field and call my class methods on the relevant inputs:
    let nameValid = Validate.inputExists(cleanInputs[0]);
    // No need to validate company as its not a required field!
    let emailValid = Validate.email(cleanInputs[2]);
    let phoneValid = Validate.phone(cleanInputs[3]);
    let subjectValid = Validate.inputExists(cleanInputs[4]);
    let messageValid = Validate.inputExists(cleanInputs[5]);
    let marketingValid = Validate.inputExists(cleanInputs[6]);

    // Store the results in an array:
    let validationResults = [nameValid, emailValid, phoneValid, subjectValid, messageValid, marketingValid];
    
    // Loop through the results and push the index of any failures to the invalidFields array:
    for(let i = 0; i < validationResults.length; i++) {
        if (validationResults[i] === false) {
            invalidFields.push(i);
        }
    }

    if (invalidFields.length === 0) {
        $($NAME_INPUT).val(cleanInputs[0]); 
        $($COMPANY_INPUT).val(cleanInputs[1]);
        $($EMAIL_INPUT).val(cleanInputs[2]);
        $($PHONE_INPUT).val(cleanInputs[3]);
        $($SUBJECT_INPUT).val(cleanInputs[4]);
        $($MESSAGE_INPUT).val(cleanInputs[5]);
        $($CHECKBOX_INPUT).val(cleanInputs[6]);
        $(FORM).submit();
    } else {
        Utility.formErrors(invalidFields);
    }
});
