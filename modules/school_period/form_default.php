<?php
	require_once($_SESSION['raiz'].'/modules/sections/role-access-admin-editor.php');

	if (isset($_POST['btn-school-period']) && $_POST['btn-school-period'] = 'true')
	{
		$i=0;

		if(isset($_SESSION['school_periods_id']))
		{
			foreach($_SESSION['school_periods_id'] as $row)
			{
				if(isset($_POST['check-school-period'.$i]))
				{
					$_SESSION['school_period'] = $_POST['check-school-period'.$i];
				}
				$i += 1;
			}
		}
	}

    //Cargamos Periodos Activos
	if(isset($_SESSION['school_period']) != '')
	{
		$_SESSION['school_periods_id'] = array();
		$_SESSION['school_periods_start_date'] = array();
		$_SESSION['school_periods_end_date'] = array();

		$i = 0;

		$sql = "SELECT * FROM school_periods WHERE active = 1";

		if($result = $conexion -> query($sql))
		{
			while ($row = mysqli_fetch_array($result))
			{
				$_SESSION['school_periods_id'][$i] = $row['school_period'];
				$_SESSION['school_periods_start_date'][$i] = $row['start_date'];
				$_SESSION['school_periods_end_date'][$i] = $row['end_date'];

				$i += 1;
			}
		}
	}
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Seleccioné</h1>
    </div>
    <div class="body">
        <form name="form-add-groups-subjects" action="#" method="POST">
            <div class="wrap">
                <?php
            echo
					'
						<table>
							<tr>
								<th class="center" colspan="4">Periodos Activos</th>
							</tr>
							';
								$i = 0;

								if(!empty($_SESSION['school_period']))
								{
									foreach($_SESSION['school_periods_id'] as $row)
									{ 
										echo'
											<tr>
												<td style="width: 40px;"><input class="cbox-subject" id="cbox-subject'.$i.'" type="checkbox" name="check-school-period'.$i.'" value="'.$_SESSION['school_periods_id'][$i].'"></td>
												<td><label for="cbox-subject'.$i.'">'.$_SESSION['school_periods_id'][$i].'</label></td>
												<td class="center"><label for="cbox-subject'.$i.'">'.$_SESSION['school_periods_start_date'][$i].'</label></td>
												<td class="center"><label for="cbox-subject'.$i.'">'.$_SESSION['school_periods_end_date'][$i].'</label></td>
											</tr>
										';
						
										$i += 1;
									}
								}
								else
								{
									$_SESSION['msgbox_error'] = 1;
									$_SESSION['text_msgbox_error'] = 'No se encontraron Periodos Activos.';

									print "<script>window.setTimeout(function() { window.location = '/modules/groups' }, 0000);</script>";
								}
							echo '
						</table>
                    ';
                    ?>
                <button class="btn-save icon" name="btn-school-period" value="true" type="submit">save</button>
            </div>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
	include_once "../sections/options-disabled.php";
?>
</div>
<script>
let Checked = null;
//The class name can vary
for (let CheckBox of document.getElementsByClassName('cbox-subject')) {
    CheckBox.onclick = function() {
        if (Checked != null) {
            Checked.checked = false;
            Checked = CheckBox;
        }
        Checked = CheckBox;
    }
}
</script>