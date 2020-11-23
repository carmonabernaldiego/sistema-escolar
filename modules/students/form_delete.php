<?php
    if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	}
    
    echo'
        <div class="form-data">
            <div class="head">
                <h1 class="titulo">Atención</h1>
            </div>
            <div class="delete">
                <h1>¿Eliminar registro?</h1>
                <form name="form-delete-students" action="delete.php" method="POST">
                    <input style="display: none;" type="text" name="txtuserid" value="'.$_POST['txtuserid'].'" />
                    <button class="btn-si icon" type="submit">check</button>
                </form>
                <form action="#" method="POST">
                    <button class="btn-no icon" name="btn" value="form_default" type="submit">close</button>
                </form>
            </div>
        </div>
        ';
echo '<div class="content-aside">';
	include_once "../sections/options-disabled.php";
echo '</div>';
?>