//----------------------------------------------------------------------------------------------------------------
// CONTACT PAGE --------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------

// Import class(es):
import { Functions } from "./Functions.js";

// Instantiate instances of imported class(es):
const util = new Functions();

// Declare jquery constants
const FORM = '.enquiry__form';
const INFO_DROPDOWN = util.INFO_DROPDOWN;
const INFO_BTN = '.info__btn';

// Form input element selectors.
const CHECKBOX_INPUT = '#e-checkbox:checked';
const FORM_SUBMIT = '#e-submit';
const NAME_INPUT = util.NAME_FIELD;
const COMPANY_INPUT = util.COMPANY_FIELD;
const EMAIL_INPUT = util.EMAIL_FIELD;
const PHONE_INPUT = util.PHONE_FIELD;
const SUBJECT_INPUT = util.SUBJECT_FIELD;
const MESSAGE_INPUT = util.MESSAGE_FIELD;

// Hidden text input used to send checkbox result on submission if JS enabled.
// If JS is disabled then PHP handles determining checkbox input.
const CHECKBOX_POST = '#e-checkbox-input';

// Allows the user to refresh the page after a successful form submission, without resubmitting the data and showing the alert.
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

// Immediately hide the information dropdown:
$($(INFO_DROPDOWN).hide());

// Event handler for the "Out of Hours IT Support" dropdown element:
$(INFO_BTN).on('click', function () {
    util.toggleDropdown();
});

// Event handler for the "Send Enquiry" submit button:
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
    let nameValid = util.checkName(cleanInputs[0]);
    let companyValid = util.checkCompany(cleanInputs[1]);
    let emailValid = util.checkEmail(cleanInputs[2]);
    let phoneValid = util.checkPhone(cleanInputs[3]);
    let subjectValid = util.checkSubject(cleanInputs[4]);
    let messageValid = util.checkMessage(cleanInputs[5]);
    let marketingValid = util.checkMarketing(cleanInputs[6]);

    // Store the results in an array:
    results.push(nameValid, companyValid, emailValid, phoneValid, subjectValid, messageValid, marketingValid);

    // Loop through the results and push the index of any failures to the invalidInputs array:
    for(let i = 0; i < results.length; i++) {
        if (results[i] === false) {
            invalidInputs.push(i);
        }
    }

    // If invalid fields is empty, override the field values with the cleaned inputs and submit the form.
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
        // Else don't submit the form and call the formErrors method, passing in the invalidInputs array.
        util.formErrors(invalidInputs);
    }
});
