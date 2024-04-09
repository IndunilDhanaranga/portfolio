$(document).ready(function () {
    var columns = [
        { data: "id" },
        { data: "date" },
        { data: "expense_type.type" },
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
        { data: "description", orderable: false },
        { data: "amount" },
        { data: "attachments", orderable: false, searchable: false },
    ];

    if (is_permission == true) {
        columns.push({ data: "action", orderable: false, searchable: false });
    }

    var table = $("#expense").DataTable({
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
            url: "/get-expense",
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
