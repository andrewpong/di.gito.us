<?
/***************************************************************************
 *		WebDB/includes/mailer.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/

$from = ("From:Andrew Pong <hakaslak@gmail.com>");
$subject = ("Your new " . $current_domain_plain . " account!");
$message = ("Welcome to " . $current_domain_plain . "!
\n
Your " . $current_domain_plain . " account has been created! To log in, proceed to the following address:
\n
" . $current_domain . "
\n
Your username and password are as follows:
\n
Username: " . $register_username . "
Password: " . $display_password . "
\n
You may go to your User CP to change your password at any time. Please keep this email for future reference. If you have any problems, feel free to contact me at
<" . $current_domain . "contact/>
\n
Andrew Pong,
" . $current_domain_plain . " webmaster
");

?>