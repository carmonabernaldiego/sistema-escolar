/*-------------------------------------------
  schoolperiods.js
  By Diego Carmona Bernal
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$(document).ready(function() {
    $(".select").select2({
        minimumResultsForSearch: Infinity
    });
});

const dateStart = new Litepicker({
    element: document.getElementById('datespstart'),
    singleMode: true
});

const dateEnd = new Litepicker({
    element: document.getElementById('datespend'),
    singleMode: true
});

$("#datespstart").focus(function() {
    dateStart.show();
    dateEnd.hide();
});

$("#datespend").focus(function() {
    dateEnd.show();
    dateStart.hide();
});

let value;

$('#selectactive').on('select2:select', function(e) {
    value = e.params.data.id;

    if (value == 0) {
        $('#selectcurrent').prop('disabled', true);
        $('#selectcurrent').val('0').trigger('change.select2');
    } else if (value == 1) {
        $('#selectcurrent').prop('disabled', false);
    }
});