$('#section-croppie-image').hide();
$(document).ready(function() {

    $image_crop = $('#image_crop').croppie({
        enableExif: true,
        viewport: {
            width: 190,
            height: 190,
            type: 'circle' //square
        },
        boundary: {
            width: 270,
            height: 270
        }
    });

    $('#file_upload_image').on('change', function() {
        var reader = new FileReader();
        reader.onload = function(event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#section-user-image').hide();
        $('#section-croppie-image').show();
    });

    $('.crop_btn').click(function(event) {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'original',
            quality: 1,
            circle: false
        }).then(function(response) {
            $('.loader-image-upload').css("visibility", "visible");
            $('#section-user-image').show();
            $('#section-croppie-image').hide();
            $.ajax({
                url: "upload.php",
                type: "POST",
                data: {
                    "image": response
                },
                success: function(res) {
                    location.href = location.href;
                    window.location.href = "/user";
                }
            });
        })

    });

});