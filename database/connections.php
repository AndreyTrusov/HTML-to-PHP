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
function get_menu()
{
    $request = "SELECT name, path FROM menu;";
    try {
        global $connection;
        $menu = $connection->query($request);
        return $menu;
    } catch (Exception $e) {
        echo "Connection to sql#get_menu: " . $e->getMessage();
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
        echo "Connection to sql#get_social_media_link_by_blog_id: " . $e->getMessage();
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
        echo "Connection to sql#get_info_links_by_blog_id: " . $e->getMessage();
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
        echo "Connection to sql#get_number_of_comments: " . $e->getMessage();
    }
}
function get_number_of_comments($id)
{
    $request = "SELECT count(id) as counter FROM comments where blogs_id = $id;";
    try {
        global $connection;
        $comments = $connection->query($request);
        foreach ($comments as $user) {
            return $user["counter"];
        }
    } catch (Exception $e) {
        echo "Connection to sql#get_number_of_comments: " . $e->getMessage();
    }
}
function get_blogs_all()
{
    $request = "SELECT id, category, title, banner_item_img_path as img1, banner_post_img_path as img2, date, views, text, user FROM blogs;";
    try {
        global $connection;
        $blogs = $connection->query($request);
        return $blogs;
    } catch (Exception $e) {
        echo "Connection to sql#get_all failed: " . $e->getMessage();
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
        echo "Connection to sql#get_user_by_id failed: " . $e->getMessage();
    }
}

?>