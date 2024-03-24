var count = 0;
function addTechnology(value = null) {
    var html =
        '<div class="row mt-2">' +
        '<div class="col-md-12">' +
        '<input type="text" class="form-control" ' + (value ? 'value="' + value + '"' : '') + ' name="technologies[]" placeholder="Technology">' +
        "</div>" +
        "</div>";

    $("#additional_technology").append(html);
    $('#remove').removeClass('d-none');
    count = count + 1;
}


function removeTechnology() {
    count = count - 1;
    $("#additional_technology").find(".row:last").remove();
    if(count == 0){
        $('#remove').addClass('d-none');
    }
}

$("#project_type_table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#project_type_table_wrapper .col-md-6:eq(0)");

function editProjectType(param) {
    var project_type = JSON.parse($(param).attr("data-project_type"));
    console.log(project_type);
    $('#project_type').val(project_type.type);
    $('#form_title').text('Update Project Type');
    $('#technologies').remove();
    $('#additional_technology').html('');
    project_type.technology_details.forEach(element => {
        addTechnology(element.technology);
    });
    $('#form_project_type').attr('action', '/update-project-type/'+project_type.id);
}
