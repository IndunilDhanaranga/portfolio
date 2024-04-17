$(document).ready(function () {
    if (work_experience.length > 0) {
        work_experience.forEach((element) => {
            addWork(
                element.company,
                element.position,
                element.from,
                element.to,
                element.responsibility
            );
        });

    }
    if (skills.length > 0) {
        skills.forEach((element) => {
            addSkills(element.skill, element.percentage);
        });
    }
    if (languages.length > 0) {
        languages.forEach((element) => {
            addLanguages(element.languages, element.percentage);
        });
    }
});

function summerNote(){
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
}

function dNoneClass(id,value) {
    console.log(value);
    if (value == 1) {
        $("#"+id).addClass("d-none");
    } else {
        $("#"+id).removeClass("d-none");
    }
}

function addWork(company, position, from, to, responsibility) {
    let index = parseInt($("#company-attempt").val());

    let html = `
        <div id="company_div_${index}">
            <div class="row mt-2">
                <div class="col-md-3 col-12">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <label for="company_${index}">Company</label>
                            <input type="text" value="${company !== undefined ? company : ""}" class="form-control" placeholder="Title" name="company[]">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <label for="position_${index}">Position</label>
                            <input type="text" value="${position !== undefined ? position : ""}" class="form-control" placeholder="Short Title" name="position[]">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <label for="from_${index}">From</label>
                            <input type="number" value="${from !== undefined ? from : ""}" class="form-control" placeholder="From" name="from[]">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <label for="to_${index}">To</label>
                    <input type="number" value="${to !== undefined ? to : ""}" class="form-control" placeholder="To" name="to[]">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="responsibility_${index}">Responsibility</label>
                </div>
                <div class="col-md-12">
                    <textarea id="responsibility_${index}" name="responsibility[]">
                        ${responsibility !== undefined ? responsibility : ""}
                    </textarea>
                </div>
            </div>
        </div>
    `;

    // Append the HTML to the company container
    $("#company").append(html);

    // Increment the index value
    $("#company-attempt").val(index + 1);

    // Initialize Summernote on the newly created textarea
    $(`#responsibility_${index}`).summernote();
}


function removeWork() {
    let attempt = parseInt($("#company-attempt").val());
    if (attempt > 0) {
        $("#company_div_" + (attempt - 1)).remove();
        $("#company-attempt").val(attempt - 1);
    }
    // dNoneClass('remove_work',$("#company-attempt").val());
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
    dNoneClass('remove_skill',$("#skills-attempt").val());
}

function removeSkills() {
    let attempt = parseInt($("#skills-attempt").val());
    if (attempt > 0) {
        $("#skills_div_" + (attempt - 1)).remove();
        $("#skills-attempt").val(attempt - 1);
    }
    dNoneClass('remove_skill',$("#skills-attempt").val());
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
    dNoneClass('remove_lang',$("#languages-attempt").val());
}

function removeLanguages() {
    let attempt = parseInt($("#languages-attempt").val());
    if (attempt > 0) {
        $("#languages_div_" + (attempt - 1)).remove();
        $("#languages-attempt").val(attempt - 1);
    }
    dNoneClass('remove_lang',$("#languages-attempt").val());
}
