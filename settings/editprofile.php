<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
if(isset($_SESSION['session_username']) && isset($_SESSION['session_password']))
{
	if(isset($_POST['settings_editpassword']))
	{
		echo "boo";
		$settings_password_old = md5(varclean($_POST['settings_password_old']));
		$settings_password_new_1 = md5(varclean($_POST['settings_password_new_1']));
		$settings_password_new_2 = md5(varclean($_POST['settings_password_new_2']));
		$user_username = varclean($_SESSION['session_username']);
		if($settings_password_new_1 == $settings_password_new_2)
		{
			if($settings_password_old == $_SESSION['session_password'])
			{
				$user_password = $_SESSION['session_password'];
				$sql = "UPDATE cms_users SET user_password = '$settings_password_new_1' WHERE user_username = '$user_username' AND user_password = '$user_password'";
				mysql_query($sql) or die('The server made a booboo... not good...');
				$_SESSION['session_password'] = $settings_password_new_1;
				require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
				require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
				?>
				<h2>Congratulations!</h2>
				<p>Your password has been successfully changed!</p>
				<p>Your new password is: <?=varclean($_POST['settings_password_new_1'])?><p>
				<p><a href="<?=$current_domain?>settings/">Return to your account settings.</a></p>
				<?
				require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
			}
			else
			{
				unset($_POST['settings_submit']);
				$error_message_send = 10; // Old password s not correct
				header('Location: ' . $_SERVER['PHP_SELF'] . '?error_msg=' . $error_message_send); 
			}
		}
		else
		{
			unset($_POST['settings_submit']);
			$error_message_send = 11; // New passwords do not match
			header('Location: ' . $_SERVER['PHP_SELF'] . '?error_msg=' . $error_message_send); 
		}
	}
	else
	{
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	?>
	<fieldset>
	<legend>Change your password</legend>
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	<table summary="<?=$current_domain_plain?> account management form. Single column, seperate row for each type of information." width="100%" id="settings" cellspacing="0" cellpadding="10" >
	<tr>
	<td>
	<label for="settings_password_old">Current password:</label>
	<br />
	<input type="password" name="settings_password_old" id="settings_password_old" maxlength="25"/>
	</td>
	</tr>
	<tr>
	<td>
	<label for="settings_password_new_1">New password:</label>
	<br />
	<input type="password" name="settings_password_new_1" id="settings_password_new_1" maxlength="25"/>
	</td>
	</tr>
	<tr>
	<td>
	<label for="settings_password_new_2">Repeat new password:</label>
	<br />
	<input type="password" name="settings_password_new_2" id="settings_password_new_2" maxlength="25"/>
	</td>
	</tr>
	<tr>
	<td>
	<input type="submit" name="Submit" id="Submit" value="Submit" />
	<input type="hidden" name="settings_editpassword" id="settings_editpassword" value="settings_editpassword" />
	</td>
	</tr>
	</table>
	</form>
	</fieldset>
	<?
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
	}
}
else
{
	header('Location: ' . $current_domain . 'errors/not_logged_in/');
}
?>