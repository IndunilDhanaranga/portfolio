$(document).ready(function () {
    if (expertise.length > 0) {
        $("#expertise-attempt").val(expertise.length);
        expertise.forEach((element) => {
            addExpertise(
                element.title,
                element.description,
                element.short_title,
                element.icon
            );
        });
    }
});

function addExpertise(title, description, short_title) {
    let index = parseInt($("#expertise-attempt").val());
    let html =
        '<div class="row mt-2" id="expertise_div_' +
        index +
        '">' +
        '<div class="col-md-3 col-12">' +
        '<div class="row ">' +
        '<div class="col-md-12 col-12">' +
        '<label for="title">Title</label>' +
        '<input type="text" value="' +
        (typeof title !== "undefined" ? title : "") +
        '" class="form-control" placeholder="Title" name="title[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-3 col-12">' +
        '<div class="row ">' +
        '<div class="col-md-12 col-12">' +
        '<label for="title">Short Title</label>' +
        '<input type="text" value="' +
        (typeof short_title !== "undefined" ? short_title : "") +
        '" class="form-control" placeholder="Short Title" name="short_title[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-2 col-12">' +
        '<div class="row ">' +
        '<div class="col-md-12 col-12">' +
        '<label for="title">Icon</label>' +
        '<input type="text" value="' +
        (typeof icon !== "undefined" ? icon : "") +
        '" class="form-control" placeholder="Icon" name="icon[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-4 col-12">' +
        '<label for="description">Description</label>' +
        '<textarea type="text" name="description[]" class="form-control" rows="4" placeholder="Description"' +
        ' data-listener-added_df30a99f="true">' +
        (typeof description !== "undefined" ? description : "") +
        "</textarea>" +
        "</div>" +
        "</div>";

    $("#expertise").append(html);
    $("#expertise-attempt").val(index + 1);
}

function removeExpertise() {
    let attempt = parseInt($("#expertise-attempt").val());
    if (attempt > 0) {
        $("#expertise_div_" + (attempt - 1)).remove();
        $("#expertise-attempt").val(attempt - 1);
    }
}
