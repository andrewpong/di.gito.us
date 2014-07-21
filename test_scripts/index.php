<?
/***************************************************************************
 *		WebDB/test/index.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
?>

<h2>Andrew Pong's scripts for testing...</h2>
<p>This page is a listing of all the scripts I use for testing.</p>
<h3>The varclean() function</h3>
<p>To check just what varclean does to a variable. I don't know...</p>
<p><a href="<?=$current_domain?>test_scripts/varclean">View varclean form</a></p>
<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
?>