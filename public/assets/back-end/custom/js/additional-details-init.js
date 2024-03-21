$(document).ready(function () {
    if (work_experience.length > 0) {
        $("#company-attempt").val(work_experience.length);
        work_experience.forEach((element) => {
            addWork(
                element.company,
                element.position,
                element.from,
                element.to
            );
        });
    }
    if (skills.length > 0) {
        $("#skills-attempt").val(skills.length);
        skills.forEach((element) => {
            addSkills(element.skill, element.percentage);
        });
    }
    if (languages.length > 0) {
        $("#languages-attempt").val(languages.length);
        languages.forEach((element) => {
            addLanguages(element.languages, element.percentage);
        });
    }
});

function addWork(company, position, from, to) {
    let index = parseInt($("#company-attempt").val());
    let html =
        '<div class="row mt-2" id="company_div_' +
        index +
        '">' +
        '<div class="col-md-3 col-12">' +
        '<div class="row ">' +
        '<div class="col-md-12 col-12">' +
        '<label for="title">Company</label>' +
        '<input type="text" value="' +
        (typeof company !== "undefined" ? company : "") +
        '" class="form-control" placeholder="Title" name="company[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-3 col-12">' +
        '<div class="row ">' +
        '<div class="col-md-12 col-12">' +
        '<label for="title">Position</label>' +
        '<input type="text" value="' +
        (typeof position !== "undefined" ? position : "") +
        '" class="form-control" placeholder="Short Title" name="position[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-3 col-12">' +
        '<div class="row ">' +
        '<div class="col-md-12 col-12">' +
        '<label for="title">From</label>' +
        '<input type="number" value="' +
        (typeof from !== "undefined" ? from : "") +
        '" class="form-control" placeholder="From" name="from[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-3 col-12">' +
        '<label for="description">To</label>' +
        '<input type="number" value="' +
        (typeof to !== "undefined" ? to : "") +
        '" class="form-control" placeholder="To" name="to[]">' +
        "</div>" +
        "</div>";

    $("#company").append(html);
    $("#company-attempt").val(index + 1);
}

function removeWork() {
    let attempt = parseInt($("#company-attempt").val());
    if (attempt > 0) {
        $("#company_div_" + (attempt - 1)).remove();
        $("#company-attempt").val(attempt - 1);
    }
}

function addSkills(skill, percentage) {
    let index = parseInt($("#skills-attempt").val());
    let html =
        '<div class="row mt-2" id="skills_div_' +
        index +
        '">' +
        '<div class="col-md-6 col-12">' +
        '<div class="row ">' +
        '<div class="col-md-12 col-12">' +
        '<label for="title">Skill</label>' +
        '<input type="text" value="' +
        (typeof skill !== "undefined" ? skill : "") +
        '" class="form-control" placeholder="Title" name="skill[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-6 col-12">' +
        '<div class="row ">' +
        '<div class="col-md-12 col-12">' +
        '<label for="title">Percentage (%)</label>' +
        '<input type="number" min="0" max="100" value="' +
        (typeof percentage !== "undefined" ? percentage : "") +
        '" class="form-control" placeholder="Percentage" name="percentage[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>";

    $("#skills").append(html);
    $("#skills-attempt").val(index + 1);
}

function removeSkills() {
    let attempt = parseInt($("#skills-attempt").val());
    if (attempt > 0) {
        $("#skills_div_" + (attempt - 1)).remove();
        $("#skills-attempt").val(attempt - 1);
    }
}

function addLanguages(languages, percentage) {
    let index = parseInt($("#languages-attempt").val());
    let html =
        '<div class="row mt-2" id="languages_div_' +
        index +
        '">' +
        '<div class="col-md-6 col-12">' +
        '<div class="row ">' +
        '<div class="col-md-12 col-12">' +
        '<label for="title">Languages</label>' +
        '<input type="text" value="' +
        (typeof languages !== "undefined" ? languages : "") +
        '" class="form-control" placeholder="Title" name="languages[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-md-6 col-12">' +
        '<div class="row ">' +
        '<div class="col-md-12 col-12">' +
        '<label for="title">Percentage (%)</label>' +
        '<input type="number" value="' +
        (typeof percentage !== "undefined" ? percentage : "") +
        '" class="form-control" placeholder="Percentage" name="lang_percentage[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>";

    $("#languages").append(html);
    $("#languages-attempt").val(index + 1);
}

function removeLanguages() {
    let attempt = parseInt($("#languages-attempt").val());
    if (attempt > 0) {
        $("#languages_div_" + (attempt - 1)).remove();
        $("#languages-attempt").val(attempt - 1);
    }
}
