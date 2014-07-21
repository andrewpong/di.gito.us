<?
/***************************************************************************
 *		WebDB/beta_scripts/install.php
 *                            -------------------
 *		begin                : Sunday, 9 December 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/

$setup_table_cms_users = "
CREATE TABLE IF NOT EXISTS cms_users (
user_id INT UNSIGNED NOT NULL AUTO_INCREMEMENT,
user_username VARCHAR(25) NOT NULL,
user_password VARCHAR(25) NOT NULL,
user_email VARCHAR(50) NOT NULL,
user_group SMALLINT UNSIGNED NOT NULL,
user_ip VARCHAR(15) NOT NULL;
user_join_date TIMESTAMP NOT_NULL CURRENT_TIMESTAMP,
PRIMARY KEY(user_id)
);
";
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
echo ('
<h2>Query Status:</h2>');
mysql_query($setup_table_cms_users) or die('<p><strong>The server could not make the table..... hmm...</strong></p>');
echo ('
<h3>Congratulations!</h3>
<p>The table has been created successfully!</p>
');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
?>