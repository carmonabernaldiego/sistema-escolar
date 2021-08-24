/*-------------------------------------------
  administratives.js
  By Diego Carmona Bernal
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$(document).ready(function() {
    $(".select").select2({
        minimumResultsForSearch: Infinity
    });
});

const dateOfBirth = new Litepicker({
    element: document.getElementById('dateofbirth'),
    singleMode: true
});

$("#dateofbirth").focus(function() {
    dateOfBirth.show();
});

$("#txtusercurp").focus(function() {
    dateOfBirth.hide();
});