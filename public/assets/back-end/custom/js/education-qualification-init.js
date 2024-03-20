$(document).ready(function () {
    if (education_qualification.length > 0) {
        $("#qualification-attempt").val(education_qualification.length);
        education_qualification.forEach((element) => {
            addQualification(
                element.school,
                element.education_level,
                element.title,
                element.description
            );
        });
    }
});

function addQualification(school, education_levels, title, description) {
    let index = parseInt($("#qualification-attempt").val());
    console.log(index);
    let html =
        '<div class="row mt-2" id="qualification_div_' +
        index +
        '">' +
        '<div class="col-md-6 col-12">' +
        '<div class="row">' +
        '<div class="col-md-6 col-12">' +
        ' <label for="school_' +
        index +
        '">College</label>' +
        '<select class="form-control select select2" style="width: 100%;" id="school_' +
        index +
        '" name="school[]">' +
        '<option value="">No Select</option>';

    school_details.forEach((element) => {
        html +=
            "<option " +
            (school == element.id ? "selected" : "") +
            ' value="' +
            element.id +
            '">' +
            element.title +
            "</option>";
    });

    html +=
        "</select>" +
        "</div>" +
        '<div class="col-md-6 col-12">' +
        ' <label for="education_level_' +
        index +
        '">Education Level</label>' +
        '<select class="form-control select select2" style="width: 100%;" id="education_level_' +
        index +
        '" name="education_level[]">' +
        '<option value="">No Select</option>';

    education_level.forEach((element) => {
        html +=
            "<option " +
            (education_levels == element.id ? "selected" : "") +
            ' value="' +
            element.id +
            '">' +
            element.title +
            "</option>";
    });

    html +=
        "</select>" +
        "</div>" +
        "</div>" +
        '<div class="row ">' +
        '<div class="col-md-12 col-12">' +
        '<label for="title">Title</label>' +
        '<input type="text" value="' +
        (typeof title !== "undefined" ? title : "") +
        '" class="form-control" placeholder="Title" name="title[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-6 col-12">' +
        '<label for="description">Description</label>' +
        '<textarea type="text" name="description[]" class="form-control" rows="4" placeholder="Description"' +
        ' data-listener-added_df30a99f="true">' +
        (typeof description !== "undefined" ? description : "") +
        "</textarea>" +
        "</div>" +
        "</div>";

    $("#qualification").append(html);

    // Initialize Select2 for the dynamically added select elements
    $("#school_" + index).select2();
    $("#education_level_" + index).select2();

    $("#qualification-attempt").val(index + 1);
}

function removeQualification() {
    let attempt = parseInt($("#qualification-attempt").val());
    if (attempt > 0) {
        $("#qualification_div_" + (attempt - 1)).remove();
        $("#qualification-attempt").val(attempt - 1);
    }
}
