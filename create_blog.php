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
                        <div style="margin-top: 40px;" class="form-group">
                            <label for="exampleFormControlInput1" style="color: #f48840;">Tittle</label>
                            <input name="create_blog_tittle" type="text" class="form-control"
                                id="exampleFormControlInput1" placeholder="Preco macky miaukaju">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput" style="color: #f48840;">Intro text</label>
                            <input name="create_blog_intro_text" type="text" class="form-control"
                                id="formGroupExampleInput" placeholder="Intro ku textu">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" style="color: #f48840;">Text</label>
                            <textarea name="create_blog_text" class="form-control" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                        <p class="text-left" style="margin-bottom: 10px; color: #f48840;">Choose category the blog belongs to:</p>
                        <?php
                        include_once('functions/functions.php');
                        echo get_category();
                        ?>
                        <br>
                        <button style="background-color: #f48840; color: white;" type="submit" class="btn ">
                            + Create blog</button>
                    </form>
                    <hr>
                    <form id="blog" action="database/create_category.inc.php" method="POST">
                        <p class="text-left" style="margin-bottom: 10px; color: #f48840;">Create new category:</p>
                        <div class="row">
                            <div class="col">
                                <input name="create_blog_new_category" type="text" class="form-control"
                                    placeholder="New category">
                            </div>
                            <div class="col">
                                <button style="background-color: #f48840; color: white;" type="submit" class="btn ">
                                    + Create category</button>
                            </div>
                        </div>
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