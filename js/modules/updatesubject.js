/*-------------------------------------------
  updatesubject.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

let selectTeachers = ',';

$(document).ready(function() {
    $(".selectCareer").select2({
        minimumResultsForSearch: Infinity
    });
    $('.select-careers-teachers').select2();

    let txtSubjectCareer = '',
        tempSubjectCareer = '',
        txtSubjectTeachers = '',
        arraySubjectTeachers;

    //Obtener carrera
    txtSubjectCareer = $('#txtsubjectcareer').val();
    tempSubjectCareer = $('#tempsubjectcareer').val();

    if (txtSubjectCareer == tempSubjectCareer) {
        //Obtener docentes seleccionados
        txtSubjectTeachers = $('#txtsubjectteachers').val();
        selectTeachers = txtSubjectTeachers;

        arraySubjectTeachers = txtSubjectTeachers.split(',');
        arraySubjectTeachers = arraySubjectTeachers.filter(me => me != '');

        $('.select-careers-teachers').val(arraySubjectTeachers).trigger("change");
    }
});

//Obtener datos del formulario, seleccionar carrera, buscar los docentes y rellenar el select-docentes
let txtSubject = '',
    txtSubjectName = '',
    txtSubjectSemester = '',
    txtSubjectDescription = '',
    selectSubjectCareerId = '',
    selectSubjectCareerName = '';

$('.selectCareer').on('select2:select', function(e) {
    selectSubjectCareerId = e.params.data.id;
    selectSubjectCareerName = e.params.data.text;
    txtSubject = $('#txtsubject').val();
    txtSubjectName = $('#txtsubjectname').val();
    txtSubjectSemester = $('#txtsubjectsemester').val();
    txtSubjectDescription = $('#txtsubjectdescription').val();

    $.ajax({
        type: 'POST',
        url: 'search_teachers.php',
        data: {
            txtsubject: txtSubject,
            txtsubjectname: txtSubjectName,
            txtsubjectsemester: txtSubjectSemester,
            txtsubjectdescription: txtSubjectDescription,
            selectsubjectcareerid: selectSubjectCareerId,
            selectsubjectcareername: selectSubjectCareerName
        },
        success: function() {
            location.reload();
        }
    });
});

//Capturar seleccionados y deseleccionados
let valueSelectTeacher = '',
    valueUnselectTeacher = '',
    tempSelectTeachers = '',
    findTeacher = '';

$('.select-careers-teachers').on('select2:select', function(e) {
    valueSelectTeacher = e.params.data.id;
    selectTeachers += valueSelectTeacher + ',';
});

$('.select-careers-teachers').on('select2:unselect', function(e) {
    tempSelectTeachers = selectTeachers;
    valueUnselectTeacher = e.params.data.id;

    findTeacher = tempSelectTeachers.replace(valueUnselectTeacher, '');
    findTeacher = findTeacher.replace(',,', ',');
    selectTeachers = findTeacher;
});

//Enviar datos
function sendTeachers() {
    $.ajax({
        type: 'POST',
        url: 'send_teachers.php',
        data: {
            txtselectteachers: selectTeachers
        },
        success: function() {
            return true;
        }
    });
}