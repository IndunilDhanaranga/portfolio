var table;
$(document).ready(function () {
    table = $("#todo-list").DataTable({
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
        columns: [
            { data: "project_details.title" },
            { data: "title" },
            { data: "task_category_details.category" },
            { data: "team_member", orderable: false },
            { data: "remaining_time", orderable: false, searchable: false },
            { data: "attachments", orderable: false, searchable: false },
            { data: "status_badge" },
            { data: "action", orderable: false, searchable: false },
        ],
        ajax: {
            url: "/get-todo",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            data: {
                _token: token,
            },
        },
    });

    var value = $("#dev").val();
    table.columns(7).search(value).draw();
    $('#dev').removeClass('btn-light');
    $('#dev').addClass('btn-dark');
});

function statusChanger(param) {
    var value = $(param).val();
    table.columns(7).search(value).draw();

    $('#status_btn button').each(function(i, obj) {
        $(obj).removeClass('btn-dark');
        $(obj).addClass('btn-light');
    });
    $(param).removeClass('btn-light');
    $(param).addClass('btn-dark');
}

$("#project_id").change(function() {
    var value = $("#project_id").val();
    table.columns(0).search(value).draw();
});



$("#task_category_id").change(function() {
    var value = $("#task_category_id").val();
    table.columns(3).search(value).draw();
});
