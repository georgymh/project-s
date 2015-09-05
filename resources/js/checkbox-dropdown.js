function toggleHours(elem) {
    var openingTimeTextField = getStartingHoursTextField(elem);
    var closingTimeTextField = getEndingHoursTextField(elem);

    if (openingTimeTextField.is('[disabled]')) {
        $(openingTimeTextField).removeAttr('disabled');
        $(closingTimeTextField).removeAttr('disabled');
    } else {
        $(openingTimeTextField).attr('disabled', 'disabled');
        $(closingTimeTextField).attr('disabled', 'disabled');
    }

    if ( $(openingTimeTextField).val().length < 6) {
        $(openingTimeTextField).val('7:00am');
    }

    if ( $(closingTimeTextField).val().length < 6) {
        $(closingTimeTextField).val('10:00pm');
    }
}

function getStartingHoursTextField(checkboxElem) {
    return  $(checkboxElem).parent().parent().next().children('.starting-hours');
}

function getEndingHoursTextField(checkboxElem) {
    return $(checkboxElem).parent().parent().next().next().children('.ending-hours');
}