$("#expense_types")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#expense_types_wrapper .col-md-6:eq(0)");


    function editExpenseType(div) {
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
                var expense_types = JSON.parse($(div).attr("data-expense_types"));
                var modal = $("#edit-expense-type");
                modal.find('[name="id"]').val(expense_types.id);
                modal.find('[name="expense_type"]').val(expense_types.type);
                modal
                    .find('[name="is_active"]')
                    .val(expense_types.is_active)
                    .trigger("change");
                modal.modal("show");
            }
        });
    }
