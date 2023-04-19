<!-- TODO: img to db / create comments to blogs / SQL Injection / contacts us / create blog / delete blog / update blog -->

<?php
include_once 'partials/header.php';
include_once 'partials/body_header.php';
session_start();
?>

<body>
    <div class="owl-banner owl-carousel"></div>

    <!-- table fith blogs -->
    <!-- create new blog -->
    <!-- page where you create blog -->

    <!-- Footer & FooterScripts -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="create_blog.php"><button style="margin-bottom: 10px;" type="button" class="btn btn btn-success btn-sm"> + Create blog</button></a>
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