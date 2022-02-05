/*-------------------------------------------
  users.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$(".select").select2({
    minimumResultsForSearch: Infinity
});

let image_crop = $('.image-crop').croppie({
    enableExif: true,
    viewport: {
        width: 190,
        height: 190,
        type: 'circle' //square
    },
    boundary: {
        width: 224,
        height: 224
    }
});

let imageSize = {
    width: 400,
    height: 400,
    type: 'square'
};

$('#section-croppie-image').hide();

$('#btnAddOptions').addClass('btn-disabled');

$('.cancel-btn').click(function(event) {
    $('.section-user-image').show();
    $('.section-user-info').show();
    $('.first').show();
    $('.last').show();
    $('#btnSave').show();
    $('.section-croppie-image').hide();
});

$('.change-btn').click(function(event) {
    $('.change-btn').blur();
    $('#fileuploadimage').trigger('click');
});

$('.file').click(function(event) {
    $('#fileuploadimage').trigger('click');
});

$('#fileuploadimage').on('change', function() {
    let reader = new FileReader();
    reader.onload = function(event) {
        image_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    $('.section-user-image').hide();
    $('.section-user-info').hide();
    $('.first').hide();
    $('.last').hide();
    $('#btnSave').hide();
    $('.section-croppie-image').show();
});

$('.crop-btn').click(function(event) {
    image_crop.croppie('result', {
        type: 'canvas',
        size: imageSize,
        quality: 0,
        circle: false
    }).then(function(response) {
        $('.loader-user').css('visibility', 'visible');
        $('.section-user-image').show();
        $('.section-user-info').show();
        $('.first').show();
        $('.last').show();
        $('#btnSave').show();
        $('.section-croppie-image').hide();
        $.ajax({
            url: 'upload.php',
            type: 'POST',
            data: {
                'image': response
            },
            success: function() {
                $('.loader-user').css('visibility', 'hidden');
                location.reload();
            }
        });
    })
});