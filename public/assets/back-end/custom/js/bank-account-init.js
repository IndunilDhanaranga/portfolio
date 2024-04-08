$("#bank_details")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#bank_details_wrapper .col-md-6:eq(0)");


    function editBankAccount(div) {
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
                var account_details = JSON.parse($(div).attr("data-bank_account"));
                var modal = $("#edit-bank-account");
                modal.find('[name="id"]').val(account_details.id);
                modal.find('[name="holder_name"]').val(account_details.account_holder);
                modal.find('[name="bank_name"]').val(account_details.bank_name);
                modal.find('[name="branch"]').val(account_details.branch);
                modal.find('[name="account_no"]').val(account_details.account_no);
                modal.find('[name="balance"]').val(account_details.balance);
                modal
                    .find('[name="is_active"]')
                    .val(account_details.is_active)
                    .trigger("change");
                modal.modal("show");
            }
        });
    }
