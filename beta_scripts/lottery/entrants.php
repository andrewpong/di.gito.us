<?
/***************************************************************************
 *		WebDB/lottery/entrants.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
if(isset($_POST['name']))
{
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	
	$sql = "SELECT * FROM hw_lottery";
	$result = mysql_query($sql);
	$num = mysql_numrows($result);
	echo "
	<table summary=\"The information that is being held in $current_domain_plain\" width=\"100%\" id=\"people_pwned\" cellspacing=\"0\" cellpadding=\"10\" >
	<caption>n00bs that put in their infromation into info.php! (Probably in the hopes of making money XD.)</caption>
	<tr><th>Name</th><th>Email</th><th>Area Code</th><th>Favorite Color</th><th>IP Address</th><th>Played Lotto</th><th>n00b level</th></tr>
	";
	$i=0;
	while ($i < $num)
	{
		$query_user_firstname = mysql_result($result,$i,"user_firstname");
		$query_user_lastname = mysql_result($result,$i,"user_lastname");
		$query_user_email = mysql_result($result,$i,"user_email");
		$query_user_area_code = mysql_result($result,$i,"user_area_code");
		$query_user_favorite_color = mysql_result($result,$i,"user_favorite_color");
		$query_user_ip = mysql_result($result,$i,"user_ip");
		$query_user_spinned_lotto = mysql_result($result,$i,"user_spinned_lotto");
		$query_noob_level = mysql_result($result,$i,"user_noob_level");
		echo("
		<tr>
		<td>" . $query_user_firstname . " " . $query_user_lastname . "</td>
		<td>" . $query_user_email . "</td>
		<td>" . $query_user_area_code . "</td>
		<td>" . $query_user_favorite_color . "</td>
		<td>" . $query_user_ip . "</td>
		<td>" . $query_user_spinned_lotto . "</td>
		<td>" . $query_noob_level . "</td>
		</tr>");
		$i++;
	}
	echo "</table>";
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
}
else
{
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	
	$sql = "SELECT * FROM hw_lottery";
	$result = mysql_query($sql);
	$num = mysql_numrows($result);
	echo "
	<table summary=\"The information that is being held in \" width=\"100%\" id=\"people_pwned\" cellspacing=\"0\" cellpadding=\"10\" >
	<caption>n00bs that put in their infromation into info.php! (Probably in the hopes of making money XD.)</caption>
	<tr><th>Name</th></tr>
	";
	$i=0;
	while ($i < $num)
	{
		$query_user_firstname = mysql_result($result,$i,"user_firstname");
		$query_user_lastname = mysql_result($result,$i,"user_lastname");
		echo("
		<tr>
		<td>" . $query_user_firstname . " " . $query_user_lastname . "</td>
		</tr>");
		$i++;
	}
	echo "</table>";
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
}
?>