$("#income_types")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#income_types_wrapper .col-md-6:eq(0)");


    function editIncomeType(div) {
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
                var income_type = JSON.parse($(div).attr("data-income_type"));
                var modal = $("#edit-income-type");
                modal.find('[name="id"]').val(income_type.id);
                modal.find('[name="income_type"]').val(income_type.type);
                modal
                    .find('[name="is_active"]')
                    .val(income_type.is_active)
                    .trigger("change");
                modal.modal("show");
            }
        });
    }
