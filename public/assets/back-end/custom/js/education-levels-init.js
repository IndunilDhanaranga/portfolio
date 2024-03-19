$(document).ready(function () {
    addLevel();
    status();
});

function addLevel() {
    let index = parseInt($('#level-attempt').val());
    let html = '<div class="row mt-2" id="level_div_' + index + '">' +
        '<div class="col-md-4 col-10">' +
        '<label for="title_' + index + '">Title</label>' +
        '<input type="text" class="form-control" placeholder="Title" id="title_' + index + '" name="title[]">' +
        '</div>' +
        '<div class="col-md-2 col-2">' +
            '<label for="title_' + index + '">Status</label>' +
            '<div class="custom-control custom-switch">'+
            '<input type="checkbox" class="custom-control-input" id="customSwitch_'+index+'" onclick="status('+index+')">'+
            '<label class="custom-control-label" for="customSwitch_'+index+'" id="checkbox-label_'+index+'">Completed</label>'+
            '</div>'+
        '</div>' +
        '<div class="col-md-6 col-12">' +
        '<div class="row" id="year-index-'+index+'">'+ // Added unique ID
        '<div class="col-md-6 col-12">' +
        '<label for="year_' + index + '">Year</label>' +
        '<input type="number" class="form-control" placeholder="Year" min="2000" name="year[]">' +
        '</div>' +
        '<div class="col-md-6 col-12">' +
        '<label for="indexno_' + index + '">Index No</label>' +
        '<input type="number" class="form-control" placeholder="Index No" min="0" name="indexno[]">' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    $('#additional-level').append(html);
    $('#level-attempt').val(index + 1);
}

function status(param) {
    var isChecked = $('#customSwitch_'+param+'').prop('checked');

    if (isChecked) {
        $('#year-index-'+param).addClass('d-none');
        $('#checkbox-label_'+param).text('Ongoing');
    } else {
        $('#year-index-'+param).removeClass('d-none');
        $('#checkbox-label_'+param).text('Completed');
    }
}

function removeLevel() {
    let attempt = parseInt($('#level-attempt').val());
    if (attempt > 0) {
        $('#level_div_' + (attempt - 1)).remove();
        $('#level-attempt').val(attempt - 1);
    }
}
