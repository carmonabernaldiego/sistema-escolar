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

let anchoVentana = window.innerWidth;

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
    showLast();
    hideFirst();
    $('#txtuserrfc').focus();
});