<?php
    if (!empty($_SESSION['msgbox_info']) == 1)
    {
        echo '
            <div class="wrap-message-info">
                <form action="#" method="POST">
			        <button class="button" name="close_msgbox_info" value="1" type="submit">X</button>
			    </form>
                <p>'.$_SESSION['text_msgbox_info'].'</p>
            </div>
        ';
    }
    if (!empty($_SESSION['msgbox_error']) == 1)
    {
        echo '
            <div class="wrap-message-error">
                <form action="#" method="POST">
			        <button class="button" name="close_msgbox_error" value="1" type="submit">X</button>
			    </form>
                <p>'.$_SESSION['text_msgbox_error'].'</p>
            </div>
        ';
    }
?>