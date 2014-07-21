<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');

if (isset($_GET['pid']) && isset($_POST['edit_submit']) && isset($_POST['edit_pid']))
{
	if ($_GET['pid'] == $_POST['edit_pid'])
	{
		$edit_post = (mysql_real_escape_string(varclean($_POST['edit_post'])));
		if ($edit_post != '')
		{
			if (post_check($edit_post))
			{
				$threadid = $_GET['tid'];
				$edit_username = $_SESSION['session_username'];
				$edit_poster = mysql_result(mysql_query("SELECT user_id FROM cms_users WHERE user_username = '$edit_username'"), 0);
				$edit_post_id = $_GET['pid'];
				$sql_update_edit = "UPDATE cms_posts SET post_body = '$edit_post' WHERE post_id = '$edit_post_id'";
				if (mysql_query($sql_update_edit) or die(mysql_error()))
				{
					header('Location: ' . $current_domain . 'forum/topic/' . $threadid . '#' . $post_id);
				}
			}
		}
		else
		{
			header('Location: ' . $current_domain . 'forum/topic/' . $threadid . '&error_msg=9');
		}
	}
}
else
{
	if(isset($_GET['pid']))
	{
		$edit_pid = $_GET['pid'];
		$edit_tid = $_GET['tid'];
		$sql_1 = mysql_query("SELECT post_user_id FROM cms_posts WHERE post_id = '$edit_pid' LIMIT 1") or die(mysql_error());
		$result_1 = mysql_result($sql_1, 0);
		$sql_2 = mysql_query("SELECT user_username FROM cms_users WHERE user_id = '$result_1' LIMIT 1") or die(mysql_error());
		$result_2 = mysql_result($sql_2, 0);
		$check_1 = strtolower($_SESSION['session_username']);
		$check_2 = strtolower($result_2);
		if ($check_1 == $check_2)
		{
			$sql_3 = mysql_query("SELECT post_body FROM cms_posts WHERE post_id = '$edit_pid'") or die(mysql_error());
			$result_3 = mysql_result($sql_3, 0);
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo '
			<form method="post" action="' . ($_SERVER['PHP_SELF']) . '?tid=' . $edit_tid . '&pid=' . $edit_pid . '">
			<table summary="Single column form for sediting an old post" width="100%" id="edit_post" cellspacing="0" cellpadding="10" >
			<caption>Edit your post.</caption>
			<tr>
			<td>
			<label for="post_t_post">Post:</label><span style="color:red;font-size:large"> &#171;</span>
			<br />
			<textarea rows="10" name="edit_post" id="edit_post">' . $result_3 . '</textarea>
			</td>
			</tr>
			<tr>
			<td>
			<input type="submit" name="Submit" id="Submit" value="Submit" />
			<input type="hidden" name="edit_submit" id="edit_submit" value="edit_submit" />
			<input type="hidden" name="edit_pid" id="edit_pid" value="' . $edit_pid . '" />
			</td>
			</tr>
			</table>
			<p>Your Internet Protocol (IP) address is being logged as ' . getenv("REMOTE_ADDR") . '</p>
			</form>
			';
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
		}
		else
		{
			header ('Location: ' . $current_domain . 'forum/');
		}
	}
}
?>