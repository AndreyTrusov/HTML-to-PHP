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



function views_update($id)
{
    echo 123;
    $request = "UPDATE blogs SET views = views + 1 WHERE blogs.id = $id;";
    try {
        global $connection;
        $menu = $connection->query($request);
    } catch (Exception $e) {
        echo "Connection to sql faild#views_update: " . $e->getMessage();
    }
}

function get_menu_all()
{
    $request = "SELECT name, path FROM menu;";
    try {
        global $connection;
        $menu = $connection->query($request);
        return $menu;
    } catch (Exception $e) {
        echo "Connection to sql faild#get_menu: " . $e->getMessage();
    }
}
function get_social_media_link_by_blog_id($id)
{
    $request = "SELECT name, link FROM social_media_links where blog_id = $id;";
    try {
        global $connection;
        $links = $connection->query($request);
        return $links;
    } catch (Exception $e) {
        echo "Connection to sql faild#get_social_media_link_by_blog_id: " . $e->getMessage();
    }
}
function get_info_links_by_blog_id($id)
{
    $request = "SELECT name, link FROM blog_info_links where blog_id = $id;";
    try {
        global $connection;
        $links = $connection->query($request);
        return $links;
    } catch (Exception $e) {
        echo "Connection to sql faild#get_info_links_by_blog_id: " . $e->getMessage();
    }
}
function get_tags_by_blog_id($id)
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
        echo "Connection to sql faild#get_number_of_comments: " . $e->getMessage();
    }
}
function get_number_of_comments($id)
{
    $request = "SELECT count(id) as counter FROM comments where blog_id = $id;";
    try {
        global $connection;
        $comments = $connection->query($request);
        foreach ($comments as $user) {
            return $user["counter"];
        }
    } catch (Exception $e) {
        echo "Connection to sql faild#get_number_of_comments: " . $e->getMessage();
    }
}
function get_blogs_all()
{
    $request = "SELECT id, category, title, banner_item_img_path as img1, banner_post_img_path as img2, date, views, text, intro_text, user FROM blogs;";
    try {
        global $connection;
        $blogs = $connection->query($request);
        return $blogs;
    } catch (Exception $e) {
        echo "Connection to sql faild#get_blogs_all failed: " . $e->getMessage();
    }
}

function get_blog_all_by_id($id)
{
    $request = "SELECT id, category, title, banner_item_img_path as img1, banner_post_img_path as img2, date, views, text, intro_text, user FROM blogs WHERE id = $id;";
    try {
        global $connection;
        $blog = $connection->query($request);
        return $blog;
    } catch (Exception $e) {
        echo "Connection to sql faild#get_blog_all_by_id failed: " . $e->getMessage();
    }
}
function get_user_by_id($id)
{
    $request = "SELECT nickname FROM user where id = $id;";
    try {
        global $connection;
        $users = $connection->query($request);
        foreach ($users as $user) {
            return $user["nickname"];
        }
    } catch (Exception $e) {
        echo "Connection to sql faild#get_user_by_id failed: " . $e->getMessage();
    } 
}

function get_comments_by_blog_id($id)
{
    $request = "SELECT text, user_id, date FROM comments where blog_id = $id;";
    try {
        global $connection;
        $comments = $connection->query($request);
        return $comments;
    } catch (Exception $e) {
        echo "Connection to sql faild#get_comments_by_blog_id: " . $e->getMessage();
    }
}

?>