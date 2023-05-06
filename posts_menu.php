<?php
include_once 'partials/header.php';
include_once 'partials/body_header.php';

if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
    exit();
}
?>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="margin-top: 200px;">
                    <!-- alerts from URL  -->
                    <?php
                    if (isset($_GET["status"])) {
                        if ($_GET["status"] == "succeed_deleted") {
                            echo '<br><div class="alert alert-success" role="alert">Blog is successfully deleted!</div>';
                        }
                    }
                    ?>
                    <!-- create button -->
                    <a href="create_blog.php"><button style="margin-bottom: 10px;" type="button"
                            class="btn btn btn-success btn-sm"> + Create blog</button></a>
                    <!-- blogs table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <?php
                        include_once('functions/functions.php');
                        get_blogs($_SESSION["user_id"]);
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php
    include_once('partials/footer.php');
    include_once('partials/footer_script.php');
    ?>

</body>

</html>