$("#user")
    .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        order: [0,'desc'],
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#user_wrapper .col-md-6:eq(0)");

    function editUser(div) {
        var url_parts = image_url.split("/");
        var cleaned_url = url_parts.filter((part) => part !== "no").join("/");
        console.log(cleaned_url);

        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to edit this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, edit it!",
        }).then((result) => {
            if (result.isConfirmed) {
                var user = JSON.parse($(div).attr("data-user"));
                console.log(user);
                var modal = $("#edit-user");
                modal.find('[name="id"]').val(user.id);
                modal.find('[name="name"]').val(user.name);
                modal.find('[name="email"]').val(user.email);
                var $imageInput = modal.find('[name="image"]');

                $imageInput.next('.dropify-wrapper').remove();
                $('.dropify-message').html('');
                $('.dropify-clear').html('');

                var $newImageInput = $imageInput.clone();
                $newImageInput.attr("data-default-file", cleaned_url + "/" + user.user_image.image_name);
                $imageInput.replaceWith($newImageInput);

                $newImageInput.dropify();

                modal.find('[name="user_roll"]').val(user.user_roll).trigger("change");
                modal.find('[name="is_active"]').val(user.is_active).trigger("change");
                modal.modal("show");
            }
        });
    }



$("#password-change").on("change", function () {
    var modal = $("#edit-user");
    if ($(this).is(":checked")) {
        modal.find("#password_div").removeClass("d-none");
    } else {
        modal.find("#password_div").addClass("d-none");
    }
});
