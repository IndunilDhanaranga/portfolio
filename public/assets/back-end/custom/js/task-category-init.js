$("#task-category")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#task-category_wrapper .col-md-6:eq(0)");

function editTaskCategory(div) {
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
            var task_category = JSON.parse($(div).attr("data-task_category"));
            var modal = $("#edit-task-category");
            modal.find('[name="id"]').val(task_category.id);
            modal.find('[name="category"]').val(task_category.category);
            modal
                .find('[name="status"]')
                .val(task_category.status)
                .trigger("change");
            modal.modal("show");
        }
    });
}
