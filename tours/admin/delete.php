<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
if(isset($_GET['deletetour']))
{
	$delete_id = ($_GET['deletetour']);
	$sql = "DELETE FROM tours WHERE tour_id = '$delete_id'";
	if  (mysql_query($sql))
	{
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
		echo ('The tour "' . $_GET['deletetour'] . '" has been deleted. woot. OUT OF FREAKING TIME!');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
	}
	else
	{
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
		var_dump($delete_id);
		echo ('crap. query did not work for some reason');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
	}
}
?>