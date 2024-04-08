var searched_mail = "";
var mail_details;
var is_read;






$(document).ready(function () {
    mailAjax();
});



function refreshMessage() {
    searched_mail = "";
    mailAjax();
}

function searchMail(){
    searched_mail = $('#search_email').val();
    mailAjax();
}

function readStatus(is_read_value, param) {
    $(param).closest('ul').find('.active').removeClass('active');
    $(param).addClass('active');
    is_read = is_read_value;
    mailAjax();
}

function backBtn() {
    mailAjax();
}




function formatDate(dateString) {
    var date = new Date(dateString);
    var now = new Date();
    var diff = now - date;
    var seconds = Math.floor(diff / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    if (days > 0) {
        return days + " day" + (days > 1 ? "s" : "") + " ago";
    } else if (hours > 0) {
        return hours + " hour" + (hours > 1 ? "s" : "") + " ago";
    } else if (minutes > 0) {
        return minutes + " minute" + (minutes > 1 ? "s" : "") + " ago";
    } else {
        return "Just now";
    }
}

function genaraeMessageBox(messages) {
    var html = "";
    messages.forEach(element => {
        html +=  `<tr onclick="messageView('${element.id}','${element.email}', '${element.name}', '${element.message}', '${element.created_at}','${element.is_read}')" ${element.is_read == 0 ? 'class="bg-dark"' : ""}>
                    <td class="mailbox-name"><a>${element.email}</a></td>
                    <td class="mailbox-subject"><b>${element.name}</b>
                    </td>
                    <td class="mailbox-date">${formatDate(element.created_at)}</td>
                </tr>`;
    });
    $("#message_tbody").html("");
    $("#message_tbody").append(html);
}


function formatDates(dateString) {
    const date = new Date(dateString);
    const options = { year: 'numeric', month: 'short', day: '2-digit', hour: '2-digit', minute: '2-digit' };
    return date.toLocaleDateString('en-US', options);
}

function messageView(id, email, name, message, created_at, already_read) {
    $("#mail_list").addClass("d-none");
    $("#mail_view_div").removeClass("d-none");

    const formattedDate = formatDates(created_at);

    var read_mail = `<div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Read Mail</h3>
                            <div class="card-tools" onclick="backBtn()">
                                <a href="#" class="btn btn-tool" title="Back"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="mailbox-read-info">
                                <h5>${name}</h5>
                                <h6>From: ${email}
                                    <span class="mailbox-read-time float-right">${formattedDate}</span>
                                </h6>
                            </div>
                            <div class="mailbox-read-message">
                                <p>${message}</p>
                            </div>
                        </div>
                    </div>`;

    $('#mail_view_div').html("");
    $('#mail_view_div').append(read_mail);

    if (already_read == 0) {
        readAjax(1, id);
    }
}


function readAjax(is_read,id) {
    $.ajax({
        type: "POST",
        url: "/client-message-markas-read",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            is_read: is_read,
            id: id,
        },
        dataType: "json",
        success: function (response) {
            if (response.success == true) {
                navbarDetails();
            }
        },
    });
}

function mailAjax() {
    $.ajax({
        type: "POST",
        url: "/client-message-get",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            is_read: is_read,
            searched_mail: searched_mail,
        },
        dataType: "json",
        success: function (response) {
            if (response.success == true) {

                $("#inbox_count").text(
                    response.data.unreaded_count + response.data.readed_count
                );
                $("#unreaded_count").text(
                    response.data.unreaded_count
                );
                $("#readed_count").text(
                    response.data.readed_count
                );
                genaraeMessageBox(response.data.message_details);
                mail_details = response.data.message_details;
                $("#mail_list").removeClass("d-none");
                $("#mail_view_div").addClass("d-none");
            }
        },
    });
}
