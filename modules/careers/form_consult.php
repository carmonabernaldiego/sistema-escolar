<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_SESSION['career'] = array();
$_SESSION['career_name'] = array();
$_SESSION['career_description'] = array();

$sql = "SELECT * FROM careers WHERE career = '" . $_POST['txtcareer'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['career'][0] = $row['career'];
		$_SESSION['career_name'][0] = $row['name'];
		$_SESSION['career_description'][0] = $row['description'];
	}
}

echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
    </div>
   <div class="body">
		<form name="form-consult-careers" action="" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Carrera</label>
					<input style="display: none;" type="text" name="txtcareer" value="' . $_SESSION['career'][0] . '"/>
					<input class="text" type="text" name="txtcareer" value="' . $_SESSION['career'][0] . '" disabled/>
				</div>
				<div class="last">
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtcareername" value="' . $_SESSION['career_name'][0] . '" required disabled/>
				</div>
				<div class="description">
					<label class="label">Descripción</label>
					<textarea disabled class="textarea" name="txtcareerdescription" data-expandable>' . $_SESSION['career_description'][0] . '</textarea>				
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit" autofocus>done</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '
</div>
<script src="/js/controls/dataexpandable.js"></script>
';