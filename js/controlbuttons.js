let btnSaveDisabled = $('#btnSave');
let btnAddOptionsDisabled = $('#btnAddOptions');
let btnExitOptionsDisabled = $('#btnExitOptions');

function activateSaveClick() {
    btnSaveDisabled.attr('disabled', false);
}

function disabledSaveClick() {
    btnSaveDisabled.attr('disabled', true);
}

function activateAddOptionsClick() {
    btnAddOptionsDisabled.attr('disabled', false);
}

function disabledAddOptionsClick() {
    btnAddOptionsDisabled.attr('disabled', true);
}

function activateExitOptionsClick() {
    btnExitOptionsDisabled.attr('disabled', false);
}

function disabledExitOptionsClick() {
    btnExitOptionsDisabled.attr('disabled', true);
}

$(function() {
    btnSaveDisabled.on('click', function() {
        setTimeout(disabledSaveClick, 300);
        setTimeout(activateSaveClick, 800);
    });

    btnAddOptionsDisabled.on('click', function() {
        setTimeout(disabledAddOptionsClick, 300);
        setTimeout(activateAddOptionsClick, 800);
    });

    btnExitOptionsDisabled.on('click', function() {
        setTimeout(disabledExitOptionsClick, 300);
        setTimeout(activateExitOptionsClick, 800);
    });
});