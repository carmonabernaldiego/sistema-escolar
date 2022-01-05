/*-------------------------------------------
  unsetnotifuser.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

function closeNotif() {
    $('.box-notification-ok').fadeOut('slow');
    $('.box-notification-error').fadeOut('slow');

    let close = 1;

    $.ajax({
        type: 'POST',
        url: '../modules/notif_info_close.php',
        data: {
            close_msgbox_info: close,
            close_msgbox_error: close
        },
        success: function() {}
    });
}

setTimeout(closeNotif, 6000);