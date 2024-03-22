$(document).ready(function () {
    if (skills.length > 0) {
        $("#skills-attempt").val(skills.length);
        skills.forEach((element) => {
            addSkills(element.skill, element.percentage);
        });
    }
    dNoneClass('remove',$("#skills-attempt").val());
});

function dNoneClass(id,value) {
    if (value == 2) {
        $("#"+id).addClass("d-none");
    } else {
        $("#"+id).removeClass("d-none");
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
    dNoneClass('remove',$("#skills-attempt").val());
}

function removeSkills() {
    let attempt = parseInt($("#skills-attempt").val());
    if (attempt > 0) {
        $("#skills_div_" + (attempt - 1)).remove();
        $("#skills-attempt").val(attempt - 1);
    }
    dNoneClass('remove',$("#skills-attempt").val());
}
