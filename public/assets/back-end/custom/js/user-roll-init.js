$("#user_roll_table").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#user_roll_table_wrapper .col-md-6:eq(0)");

$(document).ready(function () {
    $("#user-role tbody tr").each(function () {
        var allchecked = true;
        $(this)
            .find(".form-check-input")
            .each(function () {
                if (!$(this).is(":checked")) {
                    allchecked = false;
                }
            });
        if (allchecked == true) {
            console.log('hello');
            $(this).find(".select-all").prop("checked", true);
        }
    });
});

function selectAll(ele) {
    if ($(ele).is(":checked")) {
        $(ele).closest("tr").find(".form-check-input").prop("checked", true);
    } else {
        $(ele).closest("tr").find(".form-check-input").prop("checked", false);
    }
}
