<?
/***************************************************************************
 *		WebDB/settings/index.php
 *                            -------------------
 *		begin                : Sunday, 12 December 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/

require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
if(isset($_SESSION['session_username']) && isset($_SESSION['session_password']))
{
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	?>
	<p>Select an option from the menu to your left.</p>
	</div>
	<?
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
}
else
{
	header('Location: ' . $current_domain . 'errors/not_logged_in/');
}
?>