<?php
include_once 'security.php';
?>
<div class="form-options">
	<div class="options">
		<form action="" method="POST">
			<button class="btn btn-disabled icon" name="btn" value="form_add" type="submit" disabled>add</button>
		</form>
		<form action="" method="POST">
			<button class="btn btn-disabled icon" name="btn" value="form_coding" type="submit" disabled>code</button>
		</form>
		<form action="" method="POST">
			<button class="btn btn-disabled icon" name="btn" value="form_printer" type="submit" disabled>print</button>
		</form>
		<form action="" method="POST">
			<button id="btnExitOptions" class="btn btn-exit icon" name="btn" value="form_default" type="submit">close</button>
		</form>
	</div>
	<div class="search">
		<form name="form-search" action="" method="POST">
			<p>
				<input type="text" class="text-search" name="search" placeholder="Buscar..." disabled>
				<button class="btn-search btn-disabled icon" type="submit" disabled>search</button>
			</p>
		</form>
	</div>
</div>