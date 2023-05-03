<?php
include_once 'partials/header.php';
include_once 'partials/body_header.php';
?>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="margin-top: 200px;">
                    <?php if (isset($_GET["status"])) if ($_GET["status"] === "succeed_deleted")
                        echo '<p class="text-left" style="margin-bottom: 10px; color: green;">Blog is deleted.</p>' ?>
                            <a href="create_blog.php"><button style="margin-bottom: 10px;" type="button"
                                    class="btn btn btn-success btn-sm"> + Create blog</button></a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                    include_once('functions/functions.php');
                    echo get_blogs($_SESSION["user_id"]);
                    ?>
                        </tbody>
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