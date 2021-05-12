<?php
if (!empty($_SESSION['msgbox_info']) == 1) {
    echo '
            <div class="box-notification-ok">
                <button onclick="closeNotif()" class="button" id="btnCloseNotifOk" name="close_msgbox_info" value="1" type="submit">X</button>
                <p>' . $_SESSION['text_msgbox_info'] . '</p>
            </div>
        ';
}
if (!empty($_SESSION['msgbox_error']) == 1) {
    echo '
            <div class="box-notification-error">
                <button onclick="closeNotif()" class="button" id="btnCloseNotifError" name="close_msgbox_error" value="1" type="submit">X</button>
                <p>' . $_SESSION['text_msgbox_error'] . '</p>
            </div>
        ';
}