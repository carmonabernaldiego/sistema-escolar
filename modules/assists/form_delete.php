<?php
    if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
    }
    
    echo'
        <div class="form-data">
            <div class="head">
                <h1>Atención</h1>
            </div>
            <div class="delete">
                <form name="form-delete-subjects" action="delete.php" method="POST">
                    <input style="display: none;" type="text" name="txtgroup" value="'.$_POST['txtgroup'].'" />
                    <input style="display: none;" type="text" name="txtgroupschoolperiod" value="'.$_POST['txtgroupschoolperiod'].'" />
                    <h1>¿Eliminar registro?</h1>
                    <button class="btn-si icon" type="submit">check</button>
                </form>
                <form action="#" method="POST">
                    <button class="btn-no icon" name="btn" value="form_default" type="submit">close</button>
                </form>
            </div>
        </div>
        ';
include_once "../sections/options-disabled.php";
?>