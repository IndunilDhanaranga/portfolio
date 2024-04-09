$(document).ready(function () {
    var columns = [
        { data: "id" },
        {
            data: "bank_details",
            render: function (data, type, row) {
                return (
                    data.account_no +
                    " - " +
                    data.account_holder +
                    " - " +
                    data.bank_name +
                    " - " +
                    data.branch
                );
            },
        },
        { data: "transaction_type_details.display_name" },
        { data: "date" },
        { data: "amount" },
        { data: "transaction" },
    ];

    var table = $("#bank-statement").DataTable({
        paging: true,
        info: true,
        ordering: true,
        searching: true,
        serverSide: true,
        destroy: true,
        responsive: true,
        order: [[0, "desc"]],
        dom: "lBfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
        lengthMenu: [
            [10, 25, 50, 100, "All"],
            [10, 25, 50, 100, "All"],
        ],
        columns: columns, // Explicitly specify the columns here
        ajax: {
            url: "/get-bank-statement",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            data: {
                _token: token,
            },

        }
    });
});
