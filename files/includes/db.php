<?

$db_server = 'localhost';
$db_schema = 'webdb';
$db_user = 'webdb';
$db_pass = 'secretpass';

try
{
	$db = new PDO("mysql:host=$db_server;dbname=$db_schema", $db_user, $db_pass);
}
catch (PDOException $e)
{
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
?>