<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
if (isset($_GET['uid']))
{
	$userid = mysql_real_escape_string($_GET['uid']);
	$sql = mysql_query("SELECT user_username, user_email, user_group, user_ip, user_joined, user_signature, user_avatar FROM cms_users where user_id = '$userid'") or die(mysql_error());
	$result = mysql_fetch_row($sql);
	if ($result)
	{
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
		echo '
		Username is: ' . $result[0] . '</br>
		Email is: *** MASKED ***<br />';
		// Email is: ' . $result[1] . '</br>
		echo '
		User group is: ' . $result[2] . '</br>
		IP: ' . $result[3] . '</br>
		Join date: ' . $result[4] . '</br>
		Signature: ' . $result[5] . '</br>
		Avatar: ' . $result[6] . '</br>
		';
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
	}
}
else
{
header ('Location: ' . $current_domain . 'forum/memberlist/');
}
?>