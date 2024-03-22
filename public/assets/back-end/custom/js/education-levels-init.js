var input_attempt;
$(document).ready(function () {
    if (education_level.length > 0) {
        education_level.forEach((element) => {
            addLevel(
                element.title,
                element.is_completed,
                element.end_year,
                element.index_no
            );
            status();
        });
        input_attempt = education_level.length;
    }
    dNoneClass('remove_level',education_level.length);
});

function addLevel(title, is_completed, end_year, index_no) {
    let index = parseInt($("#level-attempt").val());
    let html =
        '<div class="row mt-2" id="level_div_' +
        index +
        '">' +
        '<div class="col-md-4 col-10">' +
        '<label for="title_' +
        index +
        '">Title</label>' +
        '<input type="text" class="form-control" placeholder="Title" id="title_' +
        index +
        '" value="' +
        (typeof title !== "undefined" ? title : "") +
        '" name="title[]">' +
        "</div>" +
        '<div class="col-md-2 col-2">' +
        '<label for="title_' +
        index +
        '">Status</label>' +
        '<div class="custom-control custom-switch mt-2">' +
        '<input type="number" name="is_completed[]" hidden id="is_completed_' +
        index +
        '" value="' +
        (typeof is_completed !== "undefined" ? is_completed : "1") +
        '" ></input>' +
        '<input type="checkbox" class="custom-control-input" id="customSwitch_' +
        index +
        '" ' +
        (is_completed == 0 ? "checked" : "") +
        ' onclick="status(' +
        index +
        ')">' +
        '<label class="custom-control-label" for="customSwitch_' +
        index +
        '" id="checkbox-label_' +
        index +
        '">' +
        (is_completed == 0 ? "Ongoing" : "Completed") +
        "</label>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-6 col-12">' +
        '<div class="row ' +
        (is_completed == 0 ? "d-none" : "") +
        '" id="year-index-' +
        index +
        '">' +
        '<div class="col-md-6 col-12">' +
        '<label for="year_' +
        index +
        '">Year</label>' +
        '<input type="number" class="form-control" placeholder="Year" min="2000" value="' +
        (end_year ? end_year : "") +
        '" name="year[]">' +
        "</div>" +
        '<div class="col-md-6 col-12">' +
        '<label for="indexno_' +
        index +
        '">Index No</label>' +
        '<input type="text" class="form-control" placeholder="Index No" min="0" value="' +
        (index_no ? index_no : "") +
        '" name="indexno[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>";

    $("#additional-level").append(html);
    $("#level-attempt").val(index + 1);
    dNoneClass('remove_level',$("#level-attempt").val());
}

function dNoneClass(id,value) {
    console.log(value);
    if (value <= input_attempt + 1) {
        $("#"+id).addClass("d-none");
    } else {
        $("#"+id).removeClass("d-none");
    }
}

function status(param) {
    var isChecked = $("#customSwitch_" + param + "").prop("checked");

    if (isChecked) {
        $("#is_completed_" + param).val(0);
        $("#year-index-" + param).addClass("d-none");
        $("#checkbox-label_" + param).text("Ongoing");
    } else {
        $("#is_completed_" + param).val(1);
        $("#year-index-" + param).removeClass("d-none");
        $("#checkbox-label_" + param).text("Completed");
    }
}

function removeLevel() {
    let attempt = parseInt($("#level-attempt").val());
    if (attempt > 0) {
        $("#level_div_" + (attempt - 1)).remove();
        $("#level-attempt").val(attempt - 1);
    }
    dNoneClass('remove_level',$("#level-attempt").val());
}
