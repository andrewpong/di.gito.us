<?
/***************************************************************************
 *		WebDB/forum/index.php
 *                            -------------------
 *		begin                : Sunday, 20 December 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');

// Generate List of threads
$generate_thread_index = $dbh->prepare(
"
SELECT
	t.topic_id AS topic_id,
	t.topic_title AS topic_title,
	t.topic_replies AS topic_replies,
	t.topic_views AS topic_views,
	t.topic_first_post AS topic_first_post,
	t.topic_last_post AS topic_last_post,
	u.user_id AS user_id

FROM
	cms_topics AS t,
	cms_users AS u,
	cms_global AS g

WHERE
	t.topic_id = g.topic_id AND
	u.user_id = g.user_id AND
	g.topic_id = ?
");
if ($generate_thread_index->execute(array($_GET['name'])))
{
	echo ('<table><thead><th>Topic Title</th><th>Topic Author</th><th>Topic Replies</th><th>Topic Views</th></thead><tbody>');
	while ($row = $generate_thread_index->fetch())
	{
		print_r($row);
	}
	echo ('</tbody></table>');
}
// end generate thread listing

$page = ((is_numeric($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1);
$max_results = 10;
$from = (($page * $max_results) - $max_results);
$allowed = array('post_title','post_date DESC');
$sortby = ((in_array($_GET['sortby'],$allowed)) ? $_GET['sortby'] : 'post_date DESC');
$sql_1 = "SELECT post_title, post_user_id, UNIX_TIMESTAMP(post_date), post_topic_id FROM cms_posts WHERE post_is_thread = '1' ORDER BY $sortby LIMIT $from, $max_results";
$getlist = mysql_query($sql_1) or die(mysql_error());
$sql_2 = "SELECT COUNT(post_is_thread) AS NUM FROM cms_posts WHERE post_is_thread = '1'";
$getcount = mysql_query($sql_2) or die(mysql_error());
$total_results = mysql_result($getcount, 0) or die(mysql_error());
$total_pages = ceil($total_results / $max_results);
$fr = $from + 1;
$to = $from + mysql_num_rows($getlist);
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
echo ('
<table summary="4 column, seperate row for each separate discussion thread." border="0" cellpadding="0" width="100%" id="forum_index">
<caption>' . $current_domain_plain . ' forums</caption>
<thead><tr>
<th scope="col">Title</th>
<th scope="col" width="75"><span align="center">Author</span></th>
<th scope="col" width="100"><span align="center">Posted</span></th>
<th scope="col" width="50"><span align="center">Replies</span></th>
</tr></thead>
<tbody>
');
while ($list = mysql_fetch_array($getlist))
{
	$post_topicid = $list["post_topic_id"];
	$post_replies = (mysql_result(mysql_query("SELECT COUNT(post_topic_id) AS NUM FROM cms_posts WHERE post_topic_id = '$post_topicid'"), 0));
	$post_replies = $post_replies - 1;
	$uid = ($list["post_user_id"]);
	$uid = ((int)$uid);
	$pun = (mysql_result(mysql_query("SELECT user_username FROM cms_users WHERE user_id = '$uid'"), 0));
	$tp = format_time($list["UNIX_TIMESTAMP(post_date)"]);
	echo '
	<tr>
	<td><a href="' . $current_domain . 'forum/topic/' . $list["post_topic_id"] . '">' . $list["post_title"] . '</a><div class="author_name">by ' . $pun . '</div></td>
	<td width="75">' . $pun . '</td>
	<td width="100"><div align="center"><div class="smallfont">' . $tp . '</div></div></td>
	<td width="50"><div align="center">' . $post_replies . '</div></td>
	</tr>
	';
}
echo '
</table><div id="forum_index_bottom">
<div id="forum_index_bottom_l">Showing ' . $fr . ' to ' . $to . ' of ' . $total_results . ' topics</div>
<div id="forum_index_bottom_r">';
if($page > 1)
{
	$prev = ($page - 1);
	echo '<a href="' . $_SERVER['PHP_SELF'] . '?page=1&sortby=' . $sortby . '">First </a>';
	echo '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . $prev . '&sortby=' . $sortby . '">Prev </a>';
}
for($i = ($page - 2); $i <= ($page + 2); $i++)
{
	if (($i >= 1) && ($i <= $total_pages))
	{
		echo ($page == $i) ? "[$i] " : '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '&sortby=' . $sortby . '">' . $i . ' </a>'; 
	}
}
if($page < $total_pages)
{
	$next = ($page + 1);
	echo '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . $next . '&sortby=' . $sortby . '">Next </a>';
	echo '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . $total_pages . '&sortby=' . $sortby . '">Last</a>';
}
echo '</div>';
// end generate thread listing

require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/forum/index_bottom.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
?>