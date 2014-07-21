<?
/***************************************************************************
 *		WebDB/forum/showthread.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
if(isset($_GET['tid']))
{
	$threadid = $_GET['tid'];
	$sql = "SELECT post_id, post_title, post_user_id, UNIX_TIMESTAMP(post_date), post_body FROM cms_posts WHERE post_topic_id = '$threadid'";
	$result = mysql_query($sql);
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	while (list($post_id, $post_title, $post_user_id, $post_date, $post_body) = mysql_fetch_row($result))
	{
		$post_body = bbcode($post_body);
		if ($post_title != '')
		{
			$post_title = ('<div class="topic_title"><h3>' . $post_title . '</h3></div>');
		}
		$row = mysql_fetch_row(mysql_query("SELECT user_username, user_signature FROM cms_users where user_id = '$post_user_id'"));
		$post_username = $row[0];
		$post_signature = $row[1];
		$edit_button = '';
		if ($post_username == $_SESSION['session_username'])
		{
			$edit_button = '<a href="' . $current_domain . 'forum/edit.php?tid=' . $threadid . '&pid=' . $post_id . '">edit</a>';
		}
		echo '' . $post_title . '
		<div id="p' . $post_id . '">
			<div class="postbit">
			<div class="postbit_stats">
				<div class="postbit_name"><a href="' . $current_domain . 'forum/showmember.php?uid=' . $post_user_id . '"><strong>' . $post_username . '</strong></a></div>
				<div class="postbit_time"><span class="smallfont">' . format_time($post_date) . '</span> | <a href="' . $current_domain . 'forum/topic/' . $threadid . '#p' . $post_id . '">' . $post_id . '</a></div>
				<div class="clearing_div"></div>
			</div>
			<div class="postbit_body">' . $post_body . '</div>
			<div class="postbit_signature">' . $post_signature . '<?div>
			' . $edit_button . '
			</div>
		</div>
		';
	}
	if(login_check())
	{
		?>
		<form method="post" action="<?=$current_domain?>forum/post.php?tid=<?=$threadid?>" id="post_p_new" name="post_p_new">
		<table summary="Single column form for replying to topic #<?=$threadid?>" width="100%" id="post_p" cellspacing="0" cellpadding="10" >
		<caption>Reply to this topic</caption>
		<tr>
		<td>
		<label for="post_p_post">Post:</label><span style="color:red;font-size:large"> &#171;</span>
		<br />
		<textarea rows="10" name="message" id="message"></textarea>
		</td>
		<td width="150">
		<?
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/bbcode_list.php');
		?>
		</td>
		<tr>
		<td width="100%">
		<input type="submit" name="Submit" id="Submit" value="Submit" />
		<input type="hidden" name="post_p_submit" id="post_p_submit" value="post_p_submit" />
		<input type="hidden" name="post_p_tid" id="post_p_tid" value="<?=$threadid?>" />
		</td>
		</tr>
		</table>
		<p>Your Internet Protocol (IP) address is being logged as <?= getenv("REMOTE_ADDR"); ?></p>
		</form>
		<?
	}
	else
	{
		echo '<p>You must be logged in to reply.</p></div>';
	}
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
}
else
{
	header('Location: ' . $current_domain . 'forum/');
}
?>