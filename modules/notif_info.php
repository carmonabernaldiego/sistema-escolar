<?php
if (!empty($_SESSION['msgbox_info']) == 1) {
    echo '
            <div class="box-notification-ok">
                <p>' . $_SESSION['text_msgbox_info'] . '</p>
            </div>
        ';
}
if (!empty($_SESSION['msgbox_error']) == 1) {
    echo '
            <div class="box-notification-error">
                <p>' . $_SESSION['text_msgbox_error'] . '</p>
            </div>
        ';
}