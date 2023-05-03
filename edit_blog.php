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
                    <?php
                    include_once('functions/functions.php');
                    echo get_blog_all_edit($_GET['blog_id']);
                    ?>
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