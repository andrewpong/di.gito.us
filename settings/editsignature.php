<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
if(isset($_SESSION['session_username']) && isset($_SESSION['session_password']))
{
	if(isset($_POST['settings_editsignature']))
	{
		$settings_signature = varclean($_POST['settings_signature']);
		$user_username = $_SESSION['session_username'];
		$sql = "UPDATE cms_users SET user_signature = '$settings_signature' WHERE user_username = '$user_username'";
		mysql_query($sql) or die('The server made a booboo... not good...');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
		?>
		<h2>Congratulations!</h2>
		<p>Your signature has been successfully changed!</p>
		<p>Your new signature is: 
		<br />
		<div id="display_signature"><?=$settings_signature?></div>
		<p>
		<p><a href="<?=$current_domain?>settings/">Return to your account settings.</a></p>
		<?
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
	}
	else
	{
	$user_username = $_SESSION['session_username'];
	$sql = "SELECT user_signature FROM cms_users WHERE user_username = '$user_username'";
	$result = mysql_query($sql) or die('The server made a booboo... not good...');
	$current_signature = mysql_result($result, 0, 'user_signature');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	?>
	<fieldset>
	<legend>Change your signature</legend>
	<strong>Current Signature:</strong>
	<br />
	<div id="display_signature"><?=$current_signature?></div>
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	<table summary="<?=$current_domain_plain?> account management form. Single column, seperate row for each type of information." width="100%" id="settings" cellspacing="0" cellpadding="10" >
	<tr>
	<td>
	<label for="settings_signature"><strong>New Signature:</strong></label>
	<br />
	<textarea name="settings_signature" id="settings_signature"></textarea>
	</td>
	</tr>
	<tr>
	<td>
	<input type="submit" name="Submit" id="Submit" value="Submit" />
	<input type="hidden" name="settings_editsignature" id="settings_editsignature" value="settings_editsignature" />
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