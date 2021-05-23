let btnSaveDisabled = $('#btnSave');

$(function() {
    btnSaveDisabled.on('click', function() {
        btnSaveDisabled.attr('disabled', true);
        setTimeout(activateClick, 1000);
    });
});

function activateClick() {
    btnSaveDisabled.attr('disabled', false);
}