<?php
function Error($textMsgBox)
{
    $_SESSION['msgbox_info'] = 0;
    $_SESSION['msgbox_error'] = 1;
    $_SESSION['text_msgbox_error'] = $textMsgBox;
}

function Info($textMsgBox)
{
    $_SESSION['msgbox_error'] = 0;
    $_SESSION['msgbox_info'] = 1;
    $_SESSION['text_msgbox_info'] = $textMsgBox;
}