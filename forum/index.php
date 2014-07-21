<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');

// Generate the forum index
$generate_forum_index = $db->prepare("SELECT * FROM cms_fora");
$generate_forum_index->execute();
echo ('<table><thead><th>Forum ID</th><th>Forum Name</th><th>Topic Count</th><th>Post Count</th></thead><tbody>');
while($row = $generate_forum_index->fetch())
{
	echo ('<tr>');
	echo ('<td>'.$row['forum_id'].'</td>');
	echo ('<td>'.$row['forum_name'].'</td>');
	echo ('<td>'.$row['forum_topics'].'</td>');
	echo ('<td>'.$row['forum_posts'].'</td>');
	echo ('</tr>');
}
echo ('</tbody></table>');
// End of forum index

require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
?>