<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'ablog_db';

try {
    $connection = new PDO("mysql:host=$servername; dbname=$databaseName", $username, $password);
} catch (PDOException $exception) {
    echo "Connection to sql failed: " . $exception->getMessage();
}
// select user name by id
function sql_get_user_nickname($id)
{
    $request = "SELECT * FROM user where id = $id;";
    try {
        global $connection;
        $user = $connection->query($request);
        foreach ($user as $us) {
            return $us["nickname"];
        }
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_user_nickname: " . $e->getMessage();
    }
}

// update views by +1
function sql_views_update($id)
{
    $request = "UPDATE blogs SET views = views + 1 WHERE blogs.id = $id;";
    try {
        global $connection;
        $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_views_update failed: " . $e->getMessage();
    }
}

// get header menu 
function sql_get_menu_all()
{
    $request = "SELECT name, path FROM menu;";
    try {
        global $connection;
        return $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_menu failed: " . $e->getMessage();
    }
}

// get social media shares that was mention in blog 
function sql_get_social_media_link_by_blog_id($id)
{
    $request = "SELECT name, link FROM social_media_links where blog_id = $id;";
    try {
        global $connection;
        return $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_social_media_link_by_blog_id failed: " . $e->getMessage();
    }
}

// get links that was mention in blog
function sql_get_info_links_by_blog_id($id)
{
    $request = "SELECT name, link FROM blog_info_links where blog_id = $id;";
    try {
        global $connection;
        return $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_info_links_by_blog_id failed: " . $e->getMessage();
    }
}
function sql_get_tags_by_blog_id($id)
{
    $request = "SELECT t.name FROM tags t
    inner join blog_tags bc on bc.category_id = t.id
    inner join blogs b on b.id = bc.blogs_id
    where bc.blogs_id =  $id;";
    $tags = "";
    try {
        global $connection;
        $categorys = $connection->query($request);
        foreach ($categorys as $user) {
            $tags = $tags . $user["name"];
        }
        return $tags;
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_tags_by_blog_id failed:  " . $e->getMessage();
    }
}

// count commnets number by blog id
function sql_get_number_of_comments($id)
{
    $request = "SELECT count(id) as counter FROM comments where blog_id = $id;";
    try {
        global $connection;
        return $connection->query($request)->fetch()[0];
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_number_of_comments failed: " . $e->getMessage();
    }
}

// get all categoryes
function sql_get_category_all()
{
    $request = "SELECT id, name FROM ablog_db.tags;";
    try {
        global $connection;
        return $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_category_all: " . $e->getMessage();
    }
}

function sql_set_category($category)
{
    $request = "INSERT INTO tags (name) VALUES ('$category');";
    try {
        global $connection;
        $connection->query($request);
        return true;
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_set_category: " . $e->getMessage();
        return false;
    }
}

// get all blogs and filter them by switch then return PDO Object
function sql_get_blogs_all($switch)
{
    // filter sql statment for diferent returns
    switch ($switch) {
        case "baner":
            $request = "SELECT id, category, title, banner_item_img_path as img1, banner_post_img_path as img2, date, views, text, intro_text, user FROM blogs
            ORDER BY date DESC LIMIT 4;";
            break;
        case "intro":
            $request = "SELECT id, category, title, banner_item_img_path as img1, banner_post_img_path as img2, date, views, text, intro_text, user FROM blogs
            ORDER BY views DESC LIMIT 3;";
            break;
        default:
            $request = "SELECT id, category, title, banner_item_img_path as img1, banner_post_img_path as img2, date, views, text, intro_text, user FROM blogs
            ORDER BY date DESC;";
    }

    try {
        global $connection;
        $blogs = $connection->query($request);
        return $blogs;
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_blogs_all failed: " . $e->getMessage();
    }
}

// get all blogs by id and return PDO Object
function sql_get_blog_all_by_id($id)
{
    $request = "SELECT id, category, title, banner_item_img_path as img1, banner_post_img_path as img2, date, views, text, intro_text, user FROM blogs WHERE id = $id;";
    try {
        global $connection;
        $blog = $connection->query($request);
        return $blog;
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_blog_all_by_id failed: " . $e->getMessage();
    }
}

// get user nickname by user id
function sql_get_user_by_id($id)
{
    $request = "SELECT nickname FROM user where id = $id;";
    try {
        global $connection;
        return $connection->query($request)->fetch()[0];
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_user_by_id failed: " . $e->getMessage();
    }
}

// get comments by blog id then return PDO Object
function sql_get_comments_by_blog_id($id)
{
    $request = "SELECT text, user_id, date FROM comments where blog_id = $id;";
    try {
        global $connection;
        $comments = $connection->query($request);
        return $comments;
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_comments_by_blog_id failed: " . $e->getMessage();
    }
}

function sql_push_comment($text, $blog_id, $user_id)
{
    $request = "INSERT INTO comments (text, blog_id, user_id, date) VALUES ('$text', $blog_id, $user_id, curdate());";
    try {
        global $connection;
        $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_push_comment";
        return false;
    }
    return true;
}


function delete_blog($id)
{
    $request = "DELETE FROM blogs WHERE blogs.id = '$id'";
    try {
        global $connection;
        $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#delete_post";
    }

    $request = "DELETE FROM social_media_links WHERE social_media_links.blog_id = '$id'";
    try {
        global $connection;
        $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#delete_blog_social media_links";
    }

    $request = "DELETE FROM comments WHERE comments.blog_.id = '$id'";
    try {
        global $connection;
        $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#delete_post";
    }

    $request = "DELETE FROM blog_tags WHERE blog_tags.blogs_id = '$id'";
    try {
        global $connection;
        $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#delete_post";
    }

    $request = "DELETE FROM blog_info_links WHERE blog_info_links.blog_id = '$id'";
    try {
        global $connection;
        $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#delete_post";
    }
    return true;
}

function sql_update_blog($text, $intro_text, $tittle, $category, $blog_id)
{

    $request = "UPDATE blogs SET title = '$tittle', text = '$text', intro_text = '$intro_text', category = '$category'
    WHERE blogs.id = '$blog_id';";

    try {
        global $connection;
        $blogs = $connection->query($request);
        return $blogs;
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_blogs_all failed: " . $e->getMessage();
    }
}
function sql_create_blog($tittle, $intro_text, $text, $category, $user_id)
{
    $request = "INSERT INTO blogs (id, title, banner_item_img_path, banner_post_img_path, date, views, text, intro_text, user, category) 
    VALUES (NULL, '$tittle', 'assets/images/banner-item-01.jpg', 'assets/images/blog-post-01.jpg',  curdate(), '0', '$text', '$intro_text', '$user_id', '$category')";
    try {
        global $connection;
        $connection->query($request);

    } catch (Exception $e) {
        echo "Connection to sql faild#sql_create_blog";
    }
    return true;
}
function sql_get_blog_category($id)
{
    $request = "SELECT category FROM blogs where id = $id;";
    try {
        global $connection;
        return $connection->query($request)->fetch()[0];
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_blog_category: " . $e->getMessage();
    }
}
function sql_get_user_name($id)
{
    $request = "SELECT user_name FROM ablog_db.user where id = '$id';";
    try {
        global $connection;
        echo $connection->query($request)->fetch()[0];
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_user_name: " . $e->getMessage();
    }
}
function sql_update_profile($username, $nickname, $id)
{
    $request = "UPDATE user SET user_name = '$username', `nickname` = '$nickname' WHERE `user`.`id` = '$id';";
    try {
        global $connection;
        echo $connection->query($request)->fetch()[0];
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_user_name: " . $e->getMessage();
    }
}
function sql_update_password($password, $id)
{
    $hashedPws = password_hash($password, PASSWORD_DEFAULT);
    $request = "UPDATE user SET heslo = '$hashedPws' WHERE user.id = '$id';";
    try {
        global $connection;
        echo $connection->query($request)->fetch()[0];
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_user_name: " . $e->getMessage();
    }
}
?>