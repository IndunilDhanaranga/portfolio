$(document).ready(function () {
    addConnections();
});

function addConnections() {
    let index = parseInt($('#connection-attempt').val());

    let html = '<div class="row mt-2" id="div_' + index + '">' +
        '<div class="col-md-6 col-12">' +
        '<label for="platform_' + index + '">Platform</label>' +
        '<input type="text" class="form-control platform" placeholder="Platform" name="platform[]">' +
        '</div>' +
        '<div class="col-md-6 col-12">' +
        '<label for="link_' + index + '">Link</label>' +
        '<input type="text" class="form-control link" placeholder="Link" name="link[]">' +
        '</div>' +
        '</div>';

    $('#additional-connection').append(html);
    $('#connection-attempt').val(index + 1);
}

function removeConnections() {
    let attempt = parseInt($('#connection-attempt').val());
    if (attempt > 0) {
        $('#additional-connection').find('.row:last').remove();
        $('#connection-attempt').val(attempt - 1);
    }
}
