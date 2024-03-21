$("#user_roll")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#user_roll_wrapper .col-md-6:eq(0)");

function editUserRoll(div) {
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
            var user_roll = JSON.parse($(div).attr("data-user_roll"));
            var modal = $("#edit-user-roll");
            modal.find('[name="id"]').val(user_roll.id);
            modal.find('[name="user_roll"]').val(user_roll.title);
            modal
                .find('[name="is_active"]')
                .val(user_roll.is_active)
                .trigger("change");
            modal.modal("show");
        }
    });
}
