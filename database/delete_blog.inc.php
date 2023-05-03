<?php
require_once 'connections.php';
// delete selected blog
delete_blog($_GET['blog_id']);
// return to previous page
header("location: ../posts_menu.php?status=succeed_deleted");
exit();
?>