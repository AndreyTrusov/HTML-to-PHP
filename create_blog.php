<?php
include_once 'partials/header.php';
include_once 'partials/body_header.php';

// if no user is logged --> relocate to main page
if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
    exit();
}
?>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Create blog fields -->
                    <div class="owl-banner owl-carousel"></div>
                    <form id="blog" action="database/create_blog.inc.php" method="POST">
                        <div style="margin-top: 40px;" class="form-group">
                            <label for="exampleFormControlInput1" style="color: #f48840;">Tittle</label>
                            <input name="create_blog_tittle" type="text" class="form-control"
                                id="exampleFormControlInput1" placeholder="Example tittle">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput" style="color: #f48840;">Intro text</label>
                            <input name="create_blog_intro_text" type="text" class="form-control"
                                id="formGroupExampleInput" placeholder="Example intro text">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" style="color: #f48840;">Text</label>
                            <textarea style="height:200px" name="create_blog_text" class="form-control" id="exampleFormControlTextarea1"
                                placeholder="Example text" rows="3"></textarea>
                        </div>
                        <p class="text-left" style="margin-bottom: 10px; color: #f48840;">Choose category the blog
                            belongs to:</p>
                        <select name="create_blog_category" class="form-select form-select-lg mb-3"
                            aria-label=".form-select-lg example">
                            <?php
                            include_once('functions/functions.php');
                            get_category();
                            ?>
                        </select>
                        <br>
                        <button style="background-color: #f48840; color: white;" type="submit" class="btn ">
                            + Create blog</button>
                    </form>
                    <!-- alerts from URL  -->
                    <?php
                    if (isset($_GET["status"])) {
                        if ($_GET["status"] == "succeed_blog_created") {
                            echo '<br><div class="alert alert-success" role="alert">Blog created!</div>';
                        } else if ($_GET["status"] == "empty_text") {
                            echo '<br><div class="alert alert-danger" role="alert">Empty text area</div>';
                        } else if ($_GET["status"] == "empty_intro_text") {
                            echo '<br><div class="alert alert-danger" role="alert">Empty intro text area</div>';
                        } else if ($_GET["status"] == "empty_tittle") {
                            echo '<br><div class="alert alert-danger" role="alert">Empty tittle</div>';
                        }
                    }
                    ?>
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
                    <!-- alerts from URL  -->
                    <?php
                    if (isset($_GET["status"])) {
                        if ($_GET["status"] == "succeed_category_created") {
                            echo '<br><div class="alert alert-success" role="alert">Category created!</div>';
                        } else if ($_GET["status"] == "empty_category") {
                            echo '<br><div class="alert alert-danger" role="alert">Empty category area</div>';
                        }
                    }
                    ?>
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