/*-------------------------------------------
  teachers.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$('.select').select2({
    minimumResultsForSearch: Infinity,
});

$('.select-user-careers').select2({
    placeholder: "Seleccioné",
});

dateOfBirth = new Litepicker({
    element: document.getElementById('dateofbirth'),
    lang: 'es-MX',
    singleMode: true,
    dropdowns: { minYear: 1970, maxYear: (new Date()).getFullYear(), months: 1, years: 1 }
});

$('#dateofbirth').focus(function(event) {
    dateOfBirth.show();
});

$(".select").next(".select2").find(".select2-selection").focus(function() {
    dateOfBirth.hide();
});

validateFirst = () => {
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

showFirst = () => {
    $('.first').show();
}

showLast = () => {
    $('.last').show();
}

showContentFull = () => {
    $('.content-full').show();
}

hideFirst = () => {
    $('.first').hide();
    $('#btnBack').show();
    $('#btnNext').hide();
    $('#btnSave').show();
}

hideLast = () => {
    $('.last').hide();
    $('#btnBack').hide();
    $('#btnNext').show();
    $('#btnSave').hide();
}

hideContentFull = () => {
    $('.content-full').hide();
}

let anchoVentana = window.innerWidth;

if (anchoVentana > 700) {
    showFirst();
    showLast();
    showContentFull();
    $('#btnBack').hide();
    $('#btnNext').hide();
    $('#btnSave').show();
} else if (anchoVentana <= 700) {
    showFirst();
    hideContentFull();
    hideLast();
    $('#txtusername').focus();
}

window.onresize = function() {
    anchoVentana = window.innerWidth;

    if (anchoVentana > 700) {
        showFirst();
        showContentFull();
        showLast();
        $('#btnBack').hide();
        $('#btnNext').hide();
        $('#btnSave').show();
    }
};

$('#btnBack').click(function(event) {
    hideLast();
    hideContentFull();
    showFirst();
    $('#txtusername').focus();
});

$('#btnNext').click(function(event) {
    if ($('#txtusername').val() == undefined) {
        showLast();
        showContentFull();
        hideFirst();
        $('#txtuserrfc').focus();
    } else {
        if (validateFirst() == 1) {
            showLast();
            showContentFull();
            hideFirst();
            $('#txtuserrfc').focus();
        }
    }
});