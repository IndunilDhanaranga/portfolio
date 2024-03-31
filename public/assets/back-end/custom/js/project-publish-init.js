$("#publish_project_table").DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    buttons: ["copy", "csv", "excel", "pdf", "print"],
});

function projectID(param) {
    var project_id = $(param).val();
    $("#publish_project_table").DataTable().column(0).search(project_id).draw();
}
