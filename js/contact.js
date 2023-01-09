//----------------------------------------------------------------------------------------------------------------
// CONTACT PAGE --------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

// Import class(es):
import { Validation } from "./Validation.js";
import { Functions } from "./Functions.js";

// Instantiate instances of imported class(es):
const util = new Functions();
const validate = new Validation();

// Declare jquery constants
const FORM = '.enquiry__form';
const INFO_DROPDOWN = util.INFO_DROPDOWN;
const INFO_BTN = '.info__btn';
const FORM_SUBMIT = '#e-submit';

// Form input element selectors.
const CHECKBOX_INPUT = '#e-checkbox:checked';
const NAME_INPUT = '#e-fname';
const COMPANY_INPUT = '#e-cname';
const EMAIL_INPUT = '#e-email';
const PHONE_INPUT = '#e-phone';
const SUBJECT_INPUT = '#e-subject';
const MESSAGE_INPUT = '#e-message';

// Hidden text input used to send checkbox result on submission.
const CHECKBOX_POST = '#e-checkbox-input'; 

// Immediately hide the information dropdown:
$($(INFO_DROPDOWN).hide());

$(INFO_BTN).on('click', function () {
    util.toggleDropdown();
});

$(FORM_SUBMIT).on('click', (event) => {
    // Prevent the default action:
    event.preventDefault();

    // Declare some empty arrays:
    let dirtyInputs = [];
    let cleanInputs = [];
    let results = [];
    let invalidInputs = [];

    // Get the values from the form inputs:
    let name = util.getValueOf(NAME_INPUT);
    let company = util.getValueOf(COMPANY_INPUT);
    let email = util.getValueOf(EMAIL_INPUT);
    let phone = util.getValueOf(PHONE_INPUT);
    let subject = util.getValueOf(SUBJECT_INPUT);
    let message = util.getValueOf(MESSAGE_INPUT);
    let marketing = util.getValueOf(CHECKBOX_INPUT);

    // Purification ------------------------------------------------------------------------------------------
    
    // Store the dirty values in an array:
    dirtyInputs.push(name, company, email, phone, subject, message, marketing);
    
    // Send the dirty array to the strip tags method and store the assign the returned array to cleanInputs:
    cleanInputs = util.stripTags(dirtyInputs);

    // Validation ------------------------------------------------------------------------------------------

    // Declare variables for every required field and call my class methods on the relevant inputs:
    let nameValid = validate.inputExists(cleanInputs[0]);
    let companyValid = validate.inputLength(cleanInputs[1]);
    let emailValid = validate.email(cleanInputs[2]);
    let phoneValid = validate.phone(cleanInputs[3]);
    let subjectValid = validate.inputExists(cleanInputs[4]);
    let messageValid = validate.inputExists(cleanInputs[5]);
    let marketingValid = validate.inputExists(cleanInputs[6]);

    // Store the results in an array:
    results.push(nameValid, companyValid, emailValid, phoneValid, subjectValid, messageValid, marketingValid);

    // Loop through the results and push the index of any failures to the invalidInputs array:
    for(let i = 0; i < results.length; i++) {
        if (results[i] === false) {
            invalidInputs.push(i);
        }
    }

    // If invalid fields is empty, no i
    if (invalidInputs.length === 0) {
        $(NAME_INPUT).val(cleanInputs[0]); 
        $(COMPANY_INPUT).val(cleanInputs[1]);
        $(EMAIL_INPUT).val(cleanInputs[2]);
        $(PHONE_INPUT).val(cleanInputs[3]);
        $(SUBJECT_INPUT).val(cleanInputs[4]);
        $(MESSAGE_INPUT).val(cleanInputs[5]);
        $(CHECKBOX_POST).val(cleanInputs[6]);
        $(FORM).submit();
    } else {
        util.formErrors(invalidInputs);
    }
});
