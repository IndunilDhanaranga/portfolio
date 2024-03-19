$(document).ready(function () {
    addSchool();
    status();
});

function addSchool() {
    let index = parseInt($('#school-attempt').val());
    let html = '<div class="row mt-2" id="div_' + index + '">' +
        '<div class="col-md-6 col-12">' +
        '<label for="school_' + index + '">School</label>' +
        '<input type="text" class="form-control" placeholder="School" id="school_' + index + '" name="school[]">' +
        '</div>' +
        '<div class="col-md-3 col-6">' +
        '<label for="from_' + index + '">From</label>' +
        '<input type="text" class="form-control" placeholder="From" name="from[]">' +
        '</div>' +
        '<div class="col-md-3 col-6">' +
        '<label for="to_' + index + '">To</label>' +
        '<input type="text" class="form-control" placeholder="To" name="to[]">' +
        '</div>' +
        '</div>';

    $('#additional-school').append(html);
    $('#school-attempt').val(index + 1);
}

function removeSchool() {
    let attempt = parseInt($('#school-attempt').val());
    if (attempt > 0) {
        $('#additional-school').find('.row:last').remove();
        $('#school-attempt').val(attempt - 1);
    }
}
