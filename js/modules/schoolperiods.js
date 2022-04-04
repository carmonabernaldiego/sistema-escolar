/*-------------------------------------------
  schoolperiods.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$('.select').select2({
    minimumResultsForSearch: Infinity
});

dateStart = new Litepicker({
    element: document.getElementById('datespstart'),
    lang: 'es-MX',
    singleMode: true
});

dateEnd = new Litepicker({
    element: document.getElementById('datespend'),
    lang: 'es-MX',
    singleMode: true
});

$('#datespstart').focus(function() {
    dateStart.show();
    dateEnd.hide();
});

$('#datespend').focus(function() {
    dateEnd.show();
    dateStart.hide();
});

$(".select").next(".select2").find(".select2-selection").focus(function() {
    dateStart.hide();
    dateEnd.hide();
});

let valcurrent, valactive;

$('#selectactive').on('select2:select', function(e) {
    dateEnd.hide();

    valcurrent = e.params.data.id;

    if (valcurrent == 0) {
        $('#selectcurrent').prop('disabled', true);
        $('#selectcurrent').val('0').trigger('change.select2');
    } else if (valcurrent == 1) {
        $('#selectcurrent').prop('disabled', false);
    }
});

$('#selectcurrent').on('select2:select', function(e) {
    valcurrent = e.params.data.id;
    valactive = $('#selectactive').val();

    if (valcurrent == 1 && valactive == 0) {
        $('#selectcurrent').val('0').trigger('change.select2');
        $('#selectcurrent').prop('disabled', true);
    }
});

$('#btnSave').click(function() {
    $('#selectcurrent').prop('disabled', false);
});