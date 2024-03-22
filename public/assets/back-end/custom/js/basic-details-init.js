$(document).ready(function () {
    if (portfolio_connections.length > 0) {
        portfolio_connections.forEach((element) => {
            addConnections(element.link, element.platform, element.icon);
        });
    }
});

function addConnections(link, platform, icon) {
    let index = parseInt($("#connection-attempt").val());

    let html =
        '<div class="row mt-2" id="div_' +
        index +
        '">' +
        '<div class="col-md-4 col-12">' +
        '<label for="platform_' +
        index +
        '">Platform</label>' +
        '<input type="text" class="form-control platform" value="' +
        (typeof platform !== "undefined" ? platform : "") +
        '" placeholder="Platform" name="platform[]">' +
        "</div>" +
        '<div class="col-md-4 col-12">' +
        '<label for="link_' +
        index +
        '">Link</label>' +
        '<input type="text" class="form-control link" value="' +
        (typeof link !== "undefined" ? link : "") +
        '" placeholder="Link" name="link[]">' +
        "</div>" +
        '<div class="col-md-4 col-12">' +
        '<label for="link_' +
        index +
        '">Icon Class</label>' +
        '<input type="text" class="form-control link" value="' +
        (typeof icon !== "undefined" ? icon : "") +
        '" placeholder="Icon Class" name="icon[]">' +
        "</div>" +
        "</div>";

    $("#additional-connection").append(html);
    $("#connection-attempt").val(index + 1);
    dNoneClass('remove_connection',$("#connection-attempt").val());
}

function dNoneClass(id,value) {
    if (value == 2) {
        $("#"+id).addClass("d-none");
    } else {
        $("#"+id).removeClass("d-none");
    }
}

function removeConnections() {
    let attempt = parseInt($("#connection-attempt").val());
    if (attempt > 0) {
        $("#additional-connection").find(".row:last").remove();
        $("#connection-attempt").val(attempt - 1);
    }
    dNoneClass('remove_connection',$("#connection-attempt").val());
}
