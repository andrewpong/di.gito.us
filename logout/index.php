<?
if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass']))
{
	setcookie("cookname", "", time()-60*60*24*100, "/");
	setcookie("cookpass", "", time()-60*60*24*100, "/");
}
session_start();
unset($_SESSION['session_username']);
unset($_SESSION['session_password']);
$_SESSION = array();
session_destroy();
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
echo '
	<h2>Logged out!</h2>
	<p>You have been logged out.</p>
	<p>Click <a href="' . $current_domain . '">here</a> to return to the homepage</p>
	';
echo '
	<meta http-equiv="Refresh" content="0;url=' . $current_domain . '">
';

require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
?>