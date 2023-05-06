<!DOCTYPE html>
<?php

include __DIR__ . '/functions/functions.php';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/body_header.php';

?>

<html lang="en">

<body>
    <div class="owl-banner owl-carousel"></div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
        </div>
        <div class="col-lg-4 col-md-6">
            <section class="blog-posts grid-system">
                <div class="container">
                    <div class="row">
                        <div class="all-blog-posts">
                            <div class="row">
                                <div class="sidebar-item submit-comment">
                                    <div class="sidebar-heading">
                                        <h2>Create account</h2>
                                    </div>
                                    <div class="content">
                                        <!-- Create account -->
                                        <form id="comment" action="database/signup.inc.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="name" type="text" id="name" placeholder="Your name"
                                                            required="">
                                                    </fieldset>
                                                </div>
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
                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="passwordrepeat" type="password" id="password"
                                                            placeholder="Repeat your password">
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button name="submit" type="submit" id="form-submit"
                                                            class="main-button">Submit</button>
                                                    </fieldset>
                                                    <!-- alerts from URL  -->
                                                    <?php
                                                    if (isset($_GET["error"])) {
                                                        if ($_GET["error"] == "emptyinput") {
                                                            echo '<br><div class="alert alert-danger" role="alert">Empty imput</div>';
                                                        } else if ($_GET["error"] == "invalidname") {
                                                            echo '<br><div class="alert alert-danger" role="alert">Invalid name, change your name</div>';
                                                        } else if ($_GET["error"] == "invalidnickname") {
                                                            echo '<br><div class="alert alert-danger" role="alert">Invalid nickname, change your nickname</div>';
                                                        } else if ($_GET["error"] == "passworddontmatch") {
                                                            echo '<br><div class="alert alert-danger" role="alert">Password do not match</div>';
                                                        } else if ($_GET["error"] == "usertaken") {
                                                            echo '<br><div class="alert alert-danger" role="alert"User name taken</div>';
                                                        } else if ($_GET["error"] == "nicknametaken") {
                                                            echo '<br><div class="alert alert-danger" role="alert">Nickname taken</div>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </form>
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