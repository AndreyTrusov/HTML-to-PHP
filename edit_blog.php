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
                <div class="col-lg-12">
                    <div class="owl-banner owl-carousel"></div>
                    <!-- get all fields from database -->
                    <?php
                    include_once('functions/functions.php');
                    get_blog_all_edit($_GET['blog_id']);
                    ?>
                    <select name="create_blog_category" class="form-select form-select-lg mb-3"
                        aria-label=".form-select-lg example">
                        <!-- get all categories -->
                        <?php
                        get_category();
                        ?>
                    </select>
                    <br>
                    <hr>
                    <button style="background-color: #17a2b8; color: white;" type="submit" class="btn ">
                        Update blog</button>
                    <br>
                    </form>
                    <!-- alerts from URL  -->
                    <?php
                    if (isset($_GET["status"])) {
                        if ($_GET["status"] == "succeed_blog_update") {
                            echo '<br><div class="alert alert-success" role="alert">Blog is updated!</div>';
                        } else if ($_GET["status"] == "empty_text") {
                            echo '<br><div class="alert alert-danger" role="alert">Empty text area</div>';
                        } else if ($_GET["status"] == "empty_intro_text") {
                            echo '<br><div class="alert alert-danger" role="alert">Empty intro text area</div>';
                        } else if ($_GET["status"] == "empty_tittle") {
                            echo '<br><div class="alert alert-danger" role="alert">Empty tittle area</div>';
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
</body>

</html>