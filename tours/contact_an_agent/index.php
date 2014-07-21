<?
/***************************************************************************
 *		WebDB/forum/post.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
if(isset($_SESSION['session_username']) && isset($_SESSION['session_password']))
{
	if (isset($_POST['tour_submit']))
	{
		$post_t_username = $_SESSION['session_username'];
		$topic_poster = mysql_result(mysql_query("SELECT user_id FROM cms_users WHERE user_username = '$post_t_username'"), 0);
		
		$topic_title = varclean($_POST['post_t_title']);
		$topic_post = varclean($_POST['post_t_post']);
		$topic_ip = (getenv("REMOTE_ADDR"));

		$topic_id = (mysql_result(mysql_query("SELECT MAX(post_topic_id) FROM cms_posts"), 0));
		$topic_id++;
		$sql_insert_topic = "INSERT INTO cms_posts SET post_user_id = '$topic_poster', post_body = '$topic_post', post_topic_id = '$topic_id', post_ip = '$topic_ip', post_title = '$topic_title', post_fora = ''";
		if (mysql_query($sql_insert_topic) or die('The server died... contact Hakaslak!'))
		{
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo ('
			<h2>Congratualtions!</h2>
			<p>Your post has been submitted!</p>
			<p><a href="' . $current_domain . 'forum/">Click here to return to the forum</a></p>
			');
			var_dump($topic_poster);
			var_dump($_SESSION['session_username']);
			echo $topic_poster;
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
		}
		else
		{
		}
	}
	else
	{
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	?>
	<img src="http://cis.srvc.net/wdb33/chap14/images/banner_left.gif" />
	<form method="post" action="<?=($_SERVER['PHP_SELF']); ?>">
	<table summary="Single column form for submitting a new topic" width="100%" id="post_t" cellspacing="0" cellpadding="10" >
		<caption>Post a new topic on the <?=$current_domain_plain?> forums</caption>
		<tr>
		<td>
		<label for="post_t_title">Title:</label>
		<br />
		<input type="text" name="post_t_title" id="post_t_title"/ maxlength="50">
		</td>
		</tr>
		<tr>
		<td>
		<label for="post_t_post">Post:</label>
		<br />
		<textarea rows="10" name="post_t_post" id="post_t_post"></textarea>
		</td>
		</tr>
		<tr>
		<td>
		<input type="submit" name="Submit" id="Submit" value="Submit" />
		<input type="hidden" name="post_t_submit" id="post_t_submit" value="post_t_submit" />
		</td>
		</tr>
	</table>
	<p>Your Internet Protocol (IP) address is being logged as <?= getenv("REMOTE_ADDR"); ?></p>
	</form>
	<?
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
	}
}
else
{
	header('Location: ' . $current_domain . 'errors/not_logged_in/');
}
?>