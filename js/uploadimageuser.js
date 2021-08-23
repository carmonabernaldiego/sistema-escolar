/*-------------------------------------------
  uploadimageuser.js
  By Diego Carmona Bernal
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$('.btn-edit-email').click(function(event) {
    $('#fileuploadimage').trigger('click');
});

$('.section-croppie-image').hide();

function confirmPass() {
    pass1 = document.getElementById('pass1');
    pass2 = document.getElementById('pass2');

    if (pass1.value != pass2.value) {
        document.getElementById('labelError').classList.add('show');

        return false;
    } else {
        document.getElementById('labelError').classList.remove('show');

        return true;
    }
}

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
        $('.wrap').hide();
        $('.section-croppie-image').show();
    });

    $('.crop-btn').click(function(event) {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport',
            quality: 1,
            circle: false
        }).then(function(response) {
            $('.wrap').show();
            $('.section-croppie-image').hide();
            $.ajax({
                url: 'upload.php',
                type: 'POST',
                data: {
                    'image': response
                },
                success: function() {
                    location.href = location.href;
                    window.location.href = '/user';
                }
            });
        })

    });
});