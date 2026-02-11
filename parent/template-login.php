<?php
/* Template Name: Page de connexion */
get_header();
?>

<div class="section">
	<div class="wrapper">
		<form method="post" class="form" autocomplete="off" action="">
			<fieldset>
				<div class="input-container">
					<label for="username">Identifiant</label>
					<input name="username" type="text">
				</div>
				<div class="input-container">
					<label for="password">Mot de passe</label>
					<input name="password" type="password">
				</div>
				<div class="input-container checkbox">
					<label for="remember">Se souvenir de moi</label>
					<input name="remember" type="checkbox" id="remember">
				</div>

				<?php wp_nonce_field('custom_login_action', 'custom_login_nonce') ?>

				<button id="submit" type="submit" name="custom_login_action">
					<p>Connexion</p>
				</button>
			</fieldset>
		</form>
		<?php form(); ?>
	</div>
</div>

<?php
function form() {
	if (
		isset($_POST['custom_login_action']) &&
		isset($_POST['custom_login_nonce']) &&
		wp_verify_nonce($_POST['custom_login_nonce'], 'custom_login_action')
	) {
		$creds = array(
			'user_login' => sanitize_user($_POST['username']),
			'user_password' => $_POST['password'],
			'remember' => !empty($_POST['remember']),
		);

		$user = wp_signon($creds, false);

		if(is_wp_error($user)) {
			if($user->get_error_code() === 'incorrect_password') {
				echo "<p>Mot de passe incorrect</p";
			} else {
				echo "<p>Identifiants invalides</p";
			}
			exit;
		} else {
			wp_redirect(home_url('/nouvelles'));
		}

		if (current_user_can('administrator')) {
			wp_redirect(admin_url());
		} else {
			if(is_user_logged_in()) wp_redirect(home_url('/nouvelles'));
		}
	}
}
?>

<?php get_footer(); ?>
