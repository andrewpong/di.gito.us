<?
/***************************************************************************
 *		WebDB/files/inlcudes/sessions.php
 *                            -------------------
 *		begin                : Sunday, 10 December 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/

session_start();
$user_username = isset($_POST['user_username']) ? ($_POST['user_username']) : $_SESSION['session_username'];
$_SESSION['session_username'] = $user_username;
?>