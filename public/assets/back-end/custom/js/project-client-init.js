$("#project_client_table")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#project_client_table_wrapper .col-md-6:eq(0)");

function editUser(div) {
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
            var user = JSON.parse($(div).attr("data-user"));
            var modal = $("#edit-project-client");
            modal.find('[name="id"]').val(user.id);
            modal.find('[name="name"]').val(user.name);
            modal.find('[name="email"]').val(user.email);
            modal.find('[name="address"]').val(user.address);
            modal.find('[name="phone"]').val(user.phone);
            modal
                .find('[name="user_roll"]')
                .val(user.user_roll)
                .trigger("change");
            modal
                .find('[name="is_active"]')
                .val(user.is_active)
                .trigger("change");
            modal.modal("show");
        }
    });
}
