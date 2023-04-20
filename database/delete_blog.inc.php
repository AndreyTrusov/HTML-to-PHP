<?php
require_once 'connections.php';
delete_post($_GET['blog_id']);
header("location: ../login.php?error=emptyinput");
exit();
?>