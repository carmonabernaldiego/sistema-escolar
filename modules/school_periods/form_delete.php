<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$sp_id = $_POST['txtspid'];
?>
<div class="form-data">
    <div class="head">
        <h1>Atención</h1>
    </div>
    <div class="delete">
        <h1>¿Estas seguro?</h1>
        <h2>¡Se borrará de forma permanente!</h2>
        <form name="form-delete-school-periods" action="delete.php" method="POST">
            <input style="display: none;" type="text" name="txtspid" value="<?php echo $sp_id; ?>" />
            <button id="btnYesDelete" class="btn-si" type="submit" autofocus>¡Si, bórralo!</button>
        </form>
        <form action="" method="POST">
            <button id="btnNoDelete" class="btn-no" name="btn" value="form_default" type="submit">Cancelar</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php include_once "../sections/options-disabled.php"; ?>
</div>