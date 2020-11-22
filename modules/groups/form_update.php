<?php
	if ($_SESSION['permissions'] != 'admin')
	{
		header('Location: /');
		exit();
	
    }
    
    if(isset($_POST['txtgroup']))
	{
		$sql = "SELECT * FROM groups WHERE id_group = '".$_POST['txtgroup']."' AND school_period = '".$_POST['txtgroupschoolperiod']."'";

		if($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['id_group'] = $row['id_group'];
				$_SESSION['school_period_group'] = $row['school_period'];
				$_SESSION['name_group'] = $row['name'];
				$_SESSION['semester_group'] = $row['semester'];
				$_SESSION['get_subjects'] = $row['subjects'];
			}
		}
	}
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Actualizar</h1>
    </div>
    <div class="body">
        <form name="form-add-groups" action="#" method="POST">
            <div class="wrap">
                <div class="first">
                    <label class="label">Grupo</label>
                    <input style="display: none;" type="text" name="txtgroup" value="<?php echo $_SESSION['id_group']; ?>"/>
                    <input class="text" type="text" name="txt" value="<?php echo $_SESSION['id_group']; ?>" maxlength="20" disabled/>
                    <label class="label">Nombre</label>
                    <input class="text" type="text" name="txtgroupname" value="<?php echo $_SESSION['name_group']; ?>" maxlength="100" autofocus required />
                </div>
                <div class="last">
                    <label class="label">Semestre</label>
                    <input class="text" type="number" name="txtgroupsemester" value="<?php echo $_SESSION['semester_group']; ?>" maxlength="2" min="1" max="12"
                        list="defaultsemestres" required />
                    <datalist id="defaultsemestres">
                        <?php
						for($i = 1; $i <= 12; $i ++)
						{
							echo
							'
								<option value="'.$i.'">
							';
						}
					?>
                    </datalist>
                    <label class="label">Asignar</label>
                    <button class="btn-add-subjects" name="btn" value="form_update_subjects"
                        type="submit">Asignaturas</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include_once "../sections/options-disabled.php";
?>