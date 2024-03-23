$("#project_table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#project_table_wrapper .col-md-6:eq(0)");

function editProject(div) {
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want edit this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, edit it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var project = JSON.parse($(div).attr("data-project"));
            var modal = $("#edit-project");
            modal.find('[name="id"]').val(project.id);
            modal.find('[name="title"]').val(project.title);
            modal.find('[name="estimate"]').val(project.estimate);
            modal.find('[name="repository"]').val(project.repository);
            modal.find('[name="description"]').val(project.description);
            modal
                .find('[name="type_id"]')
                .val(project.type_id)
                .trigger("change");
            modal.find('[name="status"]').val(project.status).trigger("change");
            modal
                .find('[name="client_id"]')
                .val(project.client_id)
                .trigger("change");
            modal.modal("show");
        }
    });
}

function viewProject(div) {
    var project = JSON.parse($(div).attr("data-project"));
    console.log(project);
    var modal = $("#view-project");
    $('#title').text(project.title);
    $('#client').text(project.client_details.name);
    $('#project_type').text(project.project_type_details.type);
    var technology = '';
    if (project.project_type_details.technology_details && project.project_type_details.technology_details.length > 0) {
        project.project_type_details.technology_details.forEach(element => {
            technology += '<li>' + element.technology + '</li>';
        });
    }

    $('#technologies').append(technology);
    $('#estimate').text(project.estimate);
    $('#description').text(project.description);
    $('#repository').text(project.repository);
    modal.modal("show");
}
