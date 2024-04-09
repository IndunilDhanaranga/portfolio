var table;
$(document).ready(function () {
    var columns = [
        {
            data: "id",
            render: function (data, type, row) {
                return "#" + data;
            },
        },
        { data: "project_details.title" },
        { data: "title" },
        { data: "task_category_details.category" },
        { data: "team_member", orderable: false },
        { data: "remaining_time", orderable: false, searchable: false },
        { data: "progress", orderable: false, searchable: false },
        { data: "attachments", orderable: false, searchable: false },
        { data: "status" }
    ];

    if (is_permission == true) {
        columns.push({ data: "action", orderable: false, searchable: false });
    }

    table = $("#task-list").DataTable({
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
        columns: columns,
        ajax: {
            url: "/get-task",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            data: {
                _token: token,
            },
        },
    });
});

// Rest of your code remains the same
