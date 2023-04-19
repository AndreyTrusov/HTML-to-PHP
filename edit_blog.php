<?php
include_once 'partials/header.php';
include_once 'partials/body_header.php';
?>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-banner owl-carousel"></div>
                    <form id="blog" action="database/create_blog.inc.php" method="POST">
                        <?php
                        include_once('functions/functions.php');
                        echo get_blog_all_edit();
                        echo get_category();
                        ?>
                        <hr>
                        <br>
                        <button style="background-color: #f48840; color: white;" type="submit" class="btn ">
                            Update blog</button>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
    include_once('partials/footer.php');
    include_once('partials/footer_script.php');
    ?>
    <script type="text/javascript" src="assets\js\custom.js"></script>
</body>

</html>