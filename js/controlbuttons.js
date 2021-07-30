/*-------------------------------------------
  controlbuttons.js
  By Diego Carmona Bernal
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

let btnSaveDisabled = $('#btnSave'),
    btnAddOptionsDisabled = $('#btnAddOptions'),
    btnExitOptionsDisabled = $('#btnExitOptions'),
    btnYesDeleteDisabled = $('#btnYesDelete'),
    btnNoDeleteDisabled = $('#btnNoDelete');

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

function activateYesDeleteClick() {
    btnYesDeleteDisabled.attr('disabled', false);
}

function disabledYesDeleteClick() {
    btnYesDeleteDisabled.attr('disabled', true);
}

function activateNoDeleteClick() {
    btnNoDeleteDisabled.attr('disabled', false);
}

function disabledNoDeleteClick() {
    btnNoDeleteDisabled.attr('disabled', true);
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

    btnYesDeleteDisabled.on('click', function() {
        setTimeout(disabledYesDeleteClick, 300);
        setTimeout(activateYesDeleteClick, 800);
    });

    btnNoDeleteDisabled.on('click', function() {
        setTimeout(disabledNoDeleteClick, 300);
        setTimeout(activateNoDeleteClick, 800);
    });
});