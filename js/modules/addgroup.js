/*-------------------------------------------
  addgroup.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$(document).ready(function() {
    $('.select-subjects').select2();
});

let txtSubject = '',
    txtSubjectName = '',
    txtSubjectSemester = '',
    txtSubjectDescription = '',
    txtSemester = '',
    selectSubjectCareer = '',
    selectSubjectCareerId = '',
    selectSubjectCareerName = '',
    optionSelect = '';

selectSubjectCareer = document.getElementById('txtgroupsemester');
selectSubjectCareer.addEventListener('change',
    function() {
        optionSelect = this.options[selectSubjectCareer.selectedIndex];
        selectSubjectCareerId = optionSelect.value;
        selectSubjectCareerName = optionSelect.text;
    });

txtSemester = document.getElementById('txtgroupsemester');
txtSemester.addEventListener('change', () => {
    txtSubject = $('#txtsubject').val();
    txtSubjectName = $('#txtsubjectname').val();
    txtSubjectSemester = $('#txtsubjectsemester').val();
    txtSubjectDescription = $('#txtsubjectdescription').val();

    let n = $('#txtgroupsemester').val();
    console.log(n);

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

let selectTeachers = ',',
    valueSelectTeacher = '',
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