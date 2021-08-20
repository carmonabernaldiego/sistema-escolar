/*-------------------------------------------
  uploadimageuser.js
  By Diego Carmona Bernal
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$('#section-croppie-image').hide();

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

//Desactivamos Enter para no ejecutar un Submit al Formulario
/*document.addEventListener('DOMContentLoaded', () => {
	document.querySelectorAll('input[type=email]').forEach(node => node.addEventListener('keypress', e => {
		if (e.keyCode == 13) {
			e.preventDefault();
		}
	}))
});*/

$(document).ready(function() {

    $image_crop = $('#image_crop').croppie({
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

    $('#file_upload_image').on('change', function() {
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
        $('#section-croppie-image').show();
    });

    $('.crop_btn').click(function(event) {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport',
            quality: 1,
            circle: false
        }).then(function(response) {
            $('.wrap').show();
            $('#section-croppie-image').hide();
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