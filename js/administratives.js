/*-------------------------------------------
  administratives.js
  By Diego Carmona Bernal
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$('.select').select2({
    minimumResultsForSearch: Infinity
});

const dateOfBirth = new Litepicker({
    element: document.getElementById('dateofbirth'),
    lang: 'es-MX',
    singleMode: true,
    dropdowns: { minYear: 1950, maxYear: (new Date()).getFullYear(), months: 1, years: 1 }
});

$('#dateofbirth').focus(function(event) {
    dateOfBirth.show();
});

$('#txtusercurp').focus(function(event) {
    dateOfBirth.hide();
});

const validateFirst = () => {
    if ($('#txtusername').val().length == 0) {
        $('#txtusername').focus();
        return 0;
    } else if ($('#txtusersurnames').val().length == 0) {
        $('#txtusersurnames').focus();
        return 0;
    } else if ($('#selectgender').val().length == 0) {
        $('#selectgender').focus();
        return 0;
    } else if ($('#dateofbirth').val().length == 0) {
        $('#dateofbirth').focus();
        return 0;
    } else if ($('#txtusercurp').val().length == 0) {
        $('#txtusercurp').focus();
        return 0;
    } else {
        return 1;
    }
}

const showFirst = () => {
    $('.first').show();
}

const showLast = () => {
    $('.last').show();
}

const hideFirst = () => {
    $('.first').hide();
    $('#btnBack').show();
    $('#btnNext').hide();
    $('#btnSave').show();
}

const hideLast = () => {
    $('.last').hide();
    $('#btnBack').hide();
    $('#btnNext').show();
    $('#btnSave').hide();
}

let anchoVentana = window.innerWidth;

if (anchoVentana > 700) {
    showFirst();
    showLast();
    $('#btnBack').hide();
    $('#btnNext').hide();
    $('#btnSave').show();
} else if (anchoVentana <= 700) {
    showFirst();
    hideLast();
    $('#txtusername').focus();
}

window.onresize = function() {
    anchoVentana = window.innerWidth;

    if (anchoVentana > 700) {
        showFirst();
        showLast();
        $('#btnBack').hide();
        $('#btnNext').hide();
        $('#btnSave').show();
    }
};

$('#btnBack').click(function(event) {
    hideLast();
    showFirst();
    $('#txtusername').focus();
});

$('#btnNext').click(function(event) {
    if (validateFirst() == 1) {
        showLast();
        hideFirst();
        $('#txtuserrfc').focus();
    }
});