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

// update views by +1
function sql_views_update($id)
{
    $request = "UPDATE blogs SET views = views + 1 WHERE blogs.id = $id;";
    try {
        global $connection;
        $menu = $connection->query($request);
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
        $menu = $connection->query($request);
        return $menu;
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
        $links = $connection->query($request);
        return $links;
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
        $links = $connection->query($request);
        return $links;
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
        $comments = $connection->query($request);
        foreach ($comments as $user) {
            return $user["counter"];
        }
    } catch (Exception $e) {
        echo "Connection to sql faild#sql_get_number_of_comments failed: " . $e->getMessage();
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
            $request = "SELECT id, category, title, banner_item_img_path as img1, banner_post_img_path as img2, date, views, text, intro_text, user FROM blogs;";
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
        $users = $connection->query($request);
        foreach ($users as $user) {
            return $user["nickname"];
        }
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
?>