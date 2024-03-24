$(document).ready(function () {
    if (school_details.length > 0) {
        $("#school-attempt").val(school_details.length);
        school_details.forEach((element) => {
            addSchool(element.title, element.from, element.to);
        });
        $('#remove').addClass('d-none');
    }
});

function addSchool(school, from, to) {
    let index = parseInt($("#school-attempt").val());
    let html =
        '<div class="row mt-2" id="div_' +
        index +
        '">' +
        '<div class="col-md-6 col-12">' +
        '<label for="school_' +
        index +
        '">School</label>' +
        '<input type="text" class="form-control" placeholder="School" value="' +
        (typeof school !== "undefined" ? school : "") +
        '" id="school_' +
        index +
        '" name="school[]">' +
        "</div>" +
        '<div class="col-md-3 col-6">' +
        '<label for="from_' +
        index +
        '">From</label>' +
        '<input type="text" class="form-control" placeholder="From" value="' +
        (typeof from !== "undefined" ? from : "") +
        '" name="from[]">' +
        "</div>" +
        '<div class="col-md-3 col-6">' +
        '<label for="to_' +
        index +
        '">To</label>' +
        '<input type="text" class="form-control" placeholder="To" value="' +
        (typeof to !== "undefined" ? to : "") +
        '" name="to[]">' +
        "</div>" +
        "</div>";

    $("#additional-school").append(html);
    $("#school-attempt").val(index + 1);
    if(school_details.length <  $("#school-attempt").val() ){
        $('#remove').removeClass('d-none');
    }
}

function removeSchool() {
    let attempt = parseInt($("#school-attempt").val());
    if (attempt > 0) {
        $("#additional-school").find(".row:last").remove();
        $("#school-attempt").val(attempt - 1);
    }
    if(school_details.length ==  $("#school-attempt").val() - school_details.length ){
        $('#remove').addClass('d-none');
    }
}
