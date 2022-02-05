<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

include_once 'load_data.php';
?>
<div class="form-data form-config-user">
	<div class="loader-user"></div>
	<div class="body">
		<div class="section-croppie-image">
			<div class="image-crop"></div>
			<div class="options">
				<a href="#" class="change-btn"><span class="icon">sync</span></a>
				<a href="#" class="crop-btn"><span class="icon">crop</span></a>
				<a href="/user" class="cancel-btn"><span class="icon">close</span></a>
			</div>
		</div>
		<form name="form-update-users" action="update.php" enctype="multipart/form-data" method="POST" onsubmit="return confirmPass()">
			<div class="wrap">
				<div class="first">
					<div class="section-user-image">
						<img src="<?php echo '/images/users/' . $_SESSION['user_image']; ?>" />
						<?php
						$date_time_start = date_create($_SESSION['image_updated_at']);
						$date_time_end = date_create(date('Y-m-d'));
						$interval = date_diff($date_time_start, $date_time_end);
						$days = intval($interval->format('%a'));

						if ($days >= 15 or $_SESSION['image_updated_at'] == null or $_SESSION['user_image'] == 'user.png') {
							echo '
						<a href="#" class="file"><span class="icon">add_a_photo</span></a>
						<input id="fileuploadimage" style="display: none;" type="file" name="fileuploadimage" accept=".jpg, .jpeg, .png" />
						';
						} else {
							echo '
						<a class="file disabled"><span class="icon">add_a_photo</span></a>
						';
							if ((15 - $days) >= 1) {
								$_SESSION['msgbox_info'] = 1;
								$_SESSION['msgbox_error'] = 0;
								$_SESSION['text_msgbox_info'] = 'Imagen de usuario actualizada recientemente.';
							}
						}
						?>
						<div class="section-user-info">
							<span class="user-name"><?php echo $_SESSION['name'] . ' ' . $_SESSION['surnames']; ?></span>
							<span class="user-id"><?php echo $_SESSION['user_id']; ?></span>
						</div>
					</div>
				</div>
				<div class="last">
					<div class="config-data-user">
						<p>
							<input disabled id="txtemailupdate" class="text" type="email" name="txtemailupdate" value="<?php echo $_SESSION['email']; ?>" maxlength="200" placeholder="Correo electrónico" autocomplete="off" required>
							<button class="btn-edit-email icon">edit</button>
						</p>
						<a class="btn-edit-info-user" href="#"><span class="icon">edit_note</span>Información Personal</a>
						<a class="btn-change-pass" href="#"><span class="icon">lock_open</span>Cambiar Contraseña</a>
					</div>
				</div>
				<div class="footer">
					<span class="user-permissions"><?php echo $_SESSION['user_type']; ?> </span>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
include_once '../modules/notif_info.php';
?>