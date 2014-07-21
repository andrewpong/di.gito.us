<?
/***************************************************************************
 *        WebDB/forum/post.php
 *                            -------------------
 *        begin                : Sunday, 12 November 2006
 *        copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *        email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
if (!login_check())
{
    header('Location: ' . $current_domain . 'errors/not_logged_in/');
    break;
}
if (!isset($_GET['fid']) || !check_is_number($_GET['fid']))
{
    header('Location: ' . $current_domain . 'forum/');
    break;
}
if (!isset($_POST['post_t_submit'])) // Submit a post to an existing topic
{
    if (isset($_GET['tid']) && isset($_POST['post_p_submit']) && isset($_POST['post_p_tid']))
    {
        if ($_GET['tid'] != $_POST['post_p_tid'])
        {
            return false;
        }
        $post_post = (mysql_real_escape_string(varclean($_POST['message'])));
        if ($post_post = '')
        {
            header('Location: ' . $current_domain . 'forum/topic/' . $post_id . '&error_msg=9');
        }
        if (!post_check($post_post))
        {
            header('Location: ' . $current_domain . 'forum/topic/' . $post_id . '&error_msg=12');
        }
        $post_ip = (getenv("REMOTE_ADDR"));
        $post_p_username = $_SESSION['session_username'];
        $post_poster = mysql_result(mysql_query("SELECT user_id FROM cms_users WHERE user_username = '$post_p_username'"), 0);
        $post_id = $_POST['post_p_tid'];
        $sql_insert_topic = "INSERT INTO cms_posts SET post_user_id = '$post_poster', post_body = '$post_post', post_topic_id = '$post_id', post_ip = '$post_ip', post_fora = '', post_is_thread = '0'";
        if (mysql_query($sql_insert_topic) or die(mysql_error()))
        {
            header('Location: ' . $current_domain . 'forum/topic/' . $post_id);
        }
    }
    else
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
        ?>
        <form method="post" action="<?=($_SERVER['PHP_SELF']); ?>">
        <table summary="Single column form for submitting a new topic" width="100%" id="post_t" cellspacing="0" cellpadding="10" >
            <caption>Post a new topic on the <?=$current_domain_plain?> forums</caption>
            <tr>
            <td>
            <label for="post_t_title">Title:</label><span style="color:red;font-size:large"> &#171;</span>
            <br />
            <input type="text" name="post_t_title" id="post_t_title"/ maxlength="50">
            </td>
            </tr>
            <tr>
            <td>
            <label for="post_t_post">Post:</label><span style="color:red;font-size:large"> &#171;</span>
            <br />
            <textarea rows="10" name="message" id="message"></textarea>
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
    $insert_topic_title = (mysql_real_escape_string(varclean($_POST['post_t_title'])));
    $insert_post_body = (mysql_real_escape_string(varclean($_POST['message'])));
    if (($insert_topic_title = '') || ($insert_post_body = ''))
    {
        header('Location: ' . $current_domain . 'forum/post.php?error_msg=9'); 
    }
    if (!post_check($topic_post))
    {
        header('Location: ' . $current_domain . 'forum/post.php?error_msg=12');  
    }
    try
    {
        $db->beginTransaction();
        
        // Count number of topics
        $count_topic_id = $db->prepare("SELECT topic_id FROM cms_topics");
        $count_topic_id->execute();
        $count_topic_id = $count_topic_id->rowCount();
        
        // Count number of posts
        $count_post_id = $db->prepare("SELECT topic_id FROM cms_topics");
        $count_post_id->execute();
        $count_post_id = $count_post_id->rowCount();
        
        // Get current User ID
        $query_user_id = ($_SESSION['user_username']);
        $insert_user_id = $db->prepare("SELECT user_id FROM cms_users WHERE user_username = '$query_post_id'");
        $insert_user_id->execute();
        while($row = $insert_user_id->fetch())
        {
            $insert_user_id = ($row);
        }  
        
        // Set up the vars to enter in
        $insert_topic_title = ($insert_topic_title);
        $insert_post_body = ($insert_post_body);
        $insert_forum_id = ($_GET['fid']);
        $insert_topic_id = ($count_topic_id++);
        $insert_post_id = ($count_post_id++);
        $insert_user_id = ($insert_user_id);
        $insert_post_ip = (getenv("REMOTE_ADDR"));
    
        // Insert data into the cms_global table for futer indexing
        $insert_post = $db->prepare("
            INSERT INTO cms_global (forum_id, topic_id, post_id, user_id)
            VALUES (:forum_id, :topic_id, :post_id, :user_id)
            ");    
        $stmt->execute(
            array(
            ':forum_id' => "$insert_forum_id",
            ':topic_id' => "$insert_topic_id",
            ':post_id' => "$insert_post_id",
            ':user_id' => "$insert_user_id",
            ));
    
        // Insert data into the cm_topics table
        $insert_post = $db->prepare("
            INSERT INTO cms_topics (topic_title, topic_views, topic_replies, topic_first_post, topic_last_post)
            VALUES (:topic_title, :topic_views, :topic_replies, :topic_first_post, :topic_last_post)
            ");    
        $stmt->execute(
            array(
            ':topic_title' => "$insert_topic_title",
            ':topic_views' => "0",
            ':topic_replies' => "0",
            ':topic_first_post' => "$insert_post_id",
            ':topic_last_post' => "$insert_post_id",
            ));
    
        // Insert the data into the cms_posts table
        $insert_post = $db->prepare("
            INSERT INTO cms_posts (post_id, post_ip, post_body)
            VALUES (:post_id, :post_ip, :post_body)
            ");    
        $stmt->execute(
            array(
            ':post_id' => "$insert_forum_id",
            ':post_ip' => "$insert_topic_id",
            ':post_body' => "$insert_post_id",
            ));
    
        $dbh->commit();
    }
    catch (Exception $e)
    {
        $dbh->rollBack();
        echo "Failed: " . $e->getMessage();
        break;
    }
    header ('Location: ' . $current_domain . 'forum/');
    break;
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
?>