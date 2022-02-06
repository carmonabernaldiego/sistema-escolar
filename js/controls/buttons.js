/*-------------------------------------------
  buttons.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

let btnSave = $('#btnSave'),
    btnAddOptions = $('#btnAddOptions'),
    btnExitOptions = $('#btnExitOptions'),
    btnYesDelete = $('#btnYesDelete'),
    btnNoDelete = $('#btnNoDelete');

function activateSave() {
    btnSave.attr('disabled', false);
}

function disabledSave() {
    btnSave.attr('disabled', true);
}

function activateAddOptions() {
    btnAddOptions.attr('disabled', false);
}

function disabledAddOptions() {
    btnAddOptions.attr('disabled', true);
}

function activateExitOptions() {
    btnExitOptions.attr('disabled', false);
}

function disabledExitOptions() {
    btnExitOptions.attr('disabled', true);
}

function activateYesDelete() {
    btnYesDelete.attr('disabled', false);
}

function disabledYesDelete() {
    btnYesDelete.attr('disabled', true);
}

function activateNoDelete() {
    btnNoDelete.attr('disabled', false);
}

function disabledNoDelete() {
    btnNoDelete.attr('disabled', true);
}

$(function() {
    btnSave.on('click', function() {
        setTimeout(disabledSave, 300);
        setTimeout(activateSave, 800);
    });

    btnAddOptions.on('click', function() {
        setTimeout(disabledAddOptions, 300);
        setTimeout(activateAddOptions, 800);
    });

    btnExitOptions.on('click', function() {
        setTimeout(disabledExitOptions, 300);
        setTimeout(activateExitOptions, 800);
    });

    btnYesDelete.on('click', function() {
        setTimeout(disabledYesDelete, 300);
        setTimeout(activateYesDelete, 800);
    });

    btnNoDelete.on('click', function() {
        setTimeout(disabledNoDelete, 300);
        setTimeout(activateNoDelete, 800);
    });
});