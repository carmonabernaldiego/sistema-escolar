/*-------------------------------------------
  administratives.js
  By Diego Carmona Bernal
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$(document).ready(function() {
    $('#selectgender').select2({
        minimumResultsForSearch: Infinity
    });
});

const dateOfBirth = new Litepicker({
    element: document.getElementById('dateofbirth'),
    lang: 'es-MX',
    singleMode: true,
    dropdowns: { minYear: 1950, maxYear: (new Date()).getFullYear(), months: 1, years: 1 }
});

$('#dateofbirth').focus(function() {
    dateOfBirth.show();
});

$('#txtusercurp').focus(function() {
    dateOfBirth.hide();
});