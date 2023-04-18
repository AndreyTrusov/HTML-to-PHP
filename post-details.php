<!DOCTYPE html>
<!-- CELU STRANKU ZMENIT, posty nech sa adresuju na totu stranku ktora sa automaticy vygeneruje podla urciteho postu -->
<?php

include __DIR__ . '/functions/functions.php';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/body_header.php';
include __DIR__ . '/database/connections.php';
sql_views_update($_GET["blog"]);
?>

<html lang="en">

<!-- Banner & Registration Banner -->
<?php
include_once('partials/banner.php');
include_once('partials/registration_banner.php');
?>

<!-- Blog -->
<section class="blog-posts grid-system">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            <?php
            // include_once('database/connections.php');
            // get if from URL and print blog ASK
            // CHANGE TO 1 LINE
            
            $blog = sql_get_blog_all_by_id($_GET["blog"]);
            get_blog_all($blog->fetch());

            ?>
            <div class="col-lg-12">
              <div class="sidebar-item comments">
                <div class="sidebar-heading">
                  <h2>
                    <?= sql_get_number_of_comments($_GET["blog"]) ?> comment
                  </h2>
                </div>
                <div class="content">
                  <!-- Comments -->
                  <ul>
                    <?php
                    get_commenst($_GET["blog"]);
                    ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div style="margin-top: 60px;" class="sidebar-item submit-comment">

                <div class="sidebar-heading">
                  <h2>Your comment</h2>
                </div>
                <div class="content">
                  <!-- Create comment -->
                  <form id="comment" action="sendcomment.php" method="POST">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="name" type="text" id="name" placeholder="Your name" required="">
                        </fieldset>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="email" type="text" id="email" placeholder="Your email" required="">
                        </fieldset>
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <fieldset>
                          <input name="subject" type="text" id="subject" placeholder="Subject">
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="message" rows="6" id="message" placeholder="Type your comment"
                            required=""></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="main-button">Submit</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <!-- Sidebar -->
        <?php
        include_once('partials/sidebar.php');
        ?>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- Footer & Footer Scripts -->
<?php
include_once('partials/footer.php');
include_once('partials/footer_script.php');
?>

</body>

</html>