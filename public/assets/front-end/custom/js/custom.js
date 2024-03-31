function sendMessage() {
    var email = $("#email").val();
    var name = $("#name").val();
    var message = $("#message").val();

    if (email && name && message) {
        $.ajax({
            type: "POST",
            url: "/client-message-send",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                email: email,
                sender_name: name,
                message: message,
            },
            dataType: "json",
            success: function (response) {
                $("#email").val("");
                $("#name").val("");
                $("#message").val("");
                var Toast = Swal.mixin({
                    toast: true,
                    position: "bottom-end",
                    showConfirmButton: false,
                    timer: 5000,
                    customClass: {
                        popup: "toast-small",
                    },
                });

                Toast.fire({
                    icon: response.icon,
                    title: response.msg,
                });
            },
        });
    } else {
        if (!email) {
            swal_message = "Email field is required.";
        } else if (!name) {
            swal_message = "Name field is required.";
        } else if (!message) {
            swal_message = "Message field is required.";
        }

        var Toast = Swal.mixin({
            toast: true,
            position: "bottom-end",
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                popup: "toast-small",
            },
        });

        Toast.fire({
            icon: "error",
            title: swal_message,
        });
    }
}
