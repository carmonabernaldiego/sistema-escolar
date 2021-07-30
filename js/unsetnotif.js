/*-------------------------------------------
  unsetnotif.js
  By Diego Carmona Bernal
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

function closeNotif() {
    if (window.matchMedia("(min-width: 963px)").matches) {
        $('.box-notification-ok').slideToggle();
        $('.box-notification-error').slideToggle();
    } else {
        $('.box-notification-ok').fadeOut('slow');
        $('.box-notification-error').fadeOut('slow');
    }

    let close = 1;

    $.ajax({
        type: 'POST',
        url: '../close_notif_info.php',
        data: {
            close_msgbox_info: close,
            close_msgbox_error: close
        },
        success: function() {}
    });
}

setTimeout(closeNotif, 6000);