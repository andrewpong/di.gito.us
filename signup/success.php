<?
/***************************************************************************
 *		WebDB/signup/success.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/

require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');

if (isset($_GET['sent_username']) && isset($_GET['sent_email_1']))
{
	$sent_username = varclean($_GET['sent_username']);
	$sent_email_1 = varclean($_GET['sent_email_1']);
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	?>
	<h2>Congratulations <?=$sent_username?>!</h2>
	<p>Your <?=$current_domain_plain?> account has been successfully created!</p>
	<p>To login, please check the email address you provided. The email you provided was:</p>
	<p><code><?=$sent_email_1?></code></p>
	<p>If you do not recieve an email within 24 hours, please <a href="<?=$current_domain?>contact">contact me</a>, and I will try to help you out.</p>
	<p>Thank you for signing up with <?=$current_domain_plain?>! I hope you have fun here!
	<?
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
}
else
{
	header('Location: ' . $current_domain); 
}
?>