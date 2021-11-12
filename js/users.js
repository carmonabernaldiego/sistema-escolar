/*-------------------------------------------
  users.js
  By Diego Carmona Bernal
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$('#section-croppie-image').hide();

$(document).ready(function() {
    $image_crop = $('.image-crop').croppie({
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

    $('.cancel-btn').click(function(event) {
        $('.section-user-image').show();
        $('.section-user-info').show();
        $('.section-croppie-image').hide();
    });

    $('.file').click(function(event) {
        $('#fileuploadimage').trigger('click');
    });

    $('#fileuploadimage').on('change', function() {
        let reader = new FileReader();
        reader.onload = function(event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('.section-user-image').hide();
        $('.section-user-info').hide();
        $('.section-croppie-image').show();
    });

    $('.crop-btn').click(function(event) {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport',
            quality: 1,
            circle: false
        }).then(function(response) {
            $('.loader-user').css('visibility', 'visible');
            $('.section-user-image').show();
            $('.section-user-info').show();
            $('.section-croppie-image').hide();
            $.ajax({
                url: 'upload.php',
                type: 'POST',
                data: {
                    'image': response
                },
                success: function() {
                    location.href = location.href;
                    window.location.href = '/modules/users/';
                }
            });
        })

    });

});