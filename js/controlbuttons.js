let btnSaveDisabled = $('#btnSave');

$(function() {
    btnSaveDisabled.on('click', function() {
        setTimeout(disabledClick, 300);
        setTimeout(activateClick, 1000);
    });
});

function activateClick() {
    btnSaveDisabled.attr('disabled', false);
}

function disabledClick() {
    btnSaveDisabled.attr('disabled', true);
}