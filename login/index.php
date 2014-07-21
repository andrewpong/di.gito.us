<?
/***************************************************************************
 *		WebDB/login/index.php
 *									 -------------------
 *		begin					: Saturday, 02 December 2006
 *		copyright				: (C) 2007 Andrew W. Pong (Hakaslak)
 *		email					: hakaslak@gmail.com
 *
 ***************************************************************************/

require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/sessions.php');

if(isset($_SESSION['session_username']) && isset($_SESSION['session_password']))
{
	echo '
	<p>Welcome, ' . $_SESSION['session_username'] . '!</p>
	<p><a href="' . $current_domain . 'settings/">Account settings.</a></p>
	<p><a href="' . $current_domain . 'logout/">Log out.</a></p>
	';
}
else
{
	if((isset($_POST['login_submit'])) ||  check_login())
	{
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
		
		// Set the variables for SQL entry
		$user_username = varclean($_POST['login_username']);
		$user_password = varclean(md5($_POST['login_password']));
		
		$query_user_login = $db->prepare('SELECT user_username FROM cms_users WHERE user_username = :user_username AND user_password = :user_password');
		$query_user_login->bindParam(':user_username', $user_username);
		$query_user_login->bindParam(':user_password', $user_password);
		$query_user_login->execute();
		$result = $query_user_login->fetchColumn();
		if ($result != $user_username)
		{
			$_SESSION = array();
			session_destroy();
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
			var_dump($result);
			echo "
			<h2>Wrong Login...</h2>
			<p>Please try again!</p>
			<p><input type='button' value='Retry' onClick='history.go(-1)'></p>
			";
		}
		else
		{
			$var_php_self = $_SERVER['PHP_SELF'];
			if ($var_php_self  == '/errors/not_logged_in/index.php')
			{
				$var_php_self  = '/forum/index.php';
			}
			$redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . $var_php_self ;
			($_SESSION['session_username'] = $user_username);
			if(isset($_POST['login_remember']))
			{
				setcookie("cookname", $_SESSION['session_username'], time()+60*60*24*100, "/");
				setcookie("cookpass", $_SESSION['session_password'], time()+60*60*24*100, "/");
			}
			echo '
			<meta http-equiv="Refresh" content="0;url=' . $redirect_url . '">
			';
			return;
		}
	}
	else
	{
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	?>
	<form method="post" action="<?=($_SERVER['PHP_SELF']); ?>">
	<table summary="<?=$current_domain_plain?> account login form. Single column, seperate row for each type of information." width="100%" id="login" cellspacing="0" cellpadding="10" >
		<caption>Login</caption>
		<tr>
		<td>
		<label for="login_username">Your username:</label>
		<br />
		<input type="text" name="login_username" id="login_username" />
		</td>
		</tr>
		<tr>
		<td>
		<label for="login_password">Your password</label>
		<br />
		<input type="password" name="login_password" id="login_password" />
		</td>
		</tr>
		<tr>
		<td>
		<input type="checkbox" name="login_remember" value="login_remember" id="login_remember" /><label for="login_remember">Remember Me!</label>
		</td>
		</tr>
		<tr>
		<td>
		<input type="submit" name="Submit" id="Submit" value="Submit" />
		<input type="hidden" name="login_submit" id="login_submit" value="login_submit" />
		</td>
		</tr>
	</table>
	<p><a href="<?=$current_domain?>signup/">Signup for a free account!</a></p>
	<p><strong>Test Account:</strong>
	<br />
	Username: <code>test</code>
	<br />
	Password: <code>test</code></p>
	</form>
<?
	}
}
?>