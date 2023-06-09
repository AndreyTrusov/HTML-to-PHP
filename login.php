<!DOCTYPE html>
<?php

include __DIR__ . '/functions/functions.php';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/body_header.php';

?>

<html lang="en">

<body>

    <div class="row">
        <div class="col-lg-4 col-md-6">
        </div>
        <div class="col-lg-4 col-md-6">
            <section class="blog-posts grid-system">
                <div class="container">
                    <div class="row" style="margin-top: 200px;">
                        <div class="all-blog-posts">
                            <div class="row">
                                <div class="sidebar-item submit-comment">
                                    <!-- Login to system -->
                                    <div class="sidebar-heading">
                                        <h2>Log in - <a href="signup.php">CREATE ACCOUNT</a></h2>
                                    </div>
                                    <div class="content">
                                        <form id="comment" action="database/login.inc.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="nickname" type="text" id="nickname"
                                                            placeholder="Your nickname" required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="password" type="password" id="password"
                                                            placeholder="Your password">
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button name="submit" type="submit" id="form-submit"
                                                            class="main-button">Log in</button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- alerts from URL  -->
                                        <?php
                                        if (isset($_GET["error"])) {
                                            if ($_GET["error"] == "emptyinput") {
                                                echo '<br><div class="alert alert-danger" role="alert">Empty imput</div>';
                                            } else if ($_GET["error"] == "wrong_nickname") {
                                                echo '<br><div class="alert alert-danger" role="alert">Invalid nickname, change your nickname</div>';
                                            } else if ($_GET["error"] == "wrong_password") {
                                                echo '<br><div class="alert alert-danger" role="alert">Invalid password</div>';
                                            } 
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    <div class="col-lg-4">
    </div>
    </div>

    <!-- Footer & FooterScripts -->
    <?php
    include('partials/footer.php');
    include('partials/footer_script.php');
    ?>
</body>

</html>