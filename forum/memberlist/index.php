<?
/***************************************************************************
 *		WebDB/memberlist/memberlist.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');

$sql = "SELECT * FROM cms_users";
$result = mysql_query($sql);
$num = mysql_numrows($result);
echo "
<table summary=\"" . $current_domain_plain . " memberlist.\" width=\"100%\" id=\"people_pwned\" cellspacing=\"0\" cellpadding=\"10\" >
<caption>The " . $current_domain_plain . " memberlist!</caption>
<tr><th>Name</th><th>IP Address</th><th>Join Date</th></tr>
";
$i=0;
while ($i < $num)
{
	$query_user_username = mysql_result($result,$i,"user_username");
	$query_user_email = mysql_result($result,$i,"user_email");
	$query_user_ip = mysql_result($result,$i,"user_ip");
	$query_user_joined = mysql_result($result,$i,"user_joined");
	echo("
	<tr>
	<td>" . $query_user_username . "</td>
	<td>" . $query_user_ip . "</td>
	<td>" . $query_user_joined . "</td>
	</tr>");
	$i++;
}
echo "</table>";

require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
?>