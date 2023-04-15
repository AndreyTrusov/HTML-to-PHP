<!DOCTYPE html>
<!-- CELU STRANKU ZMENIT, posty nech sa adresuju na totu stranku ktora sa automaticy vygeneruje podla urciteho postu -->
<?php

include __DIR__ . '/functions/functions.php';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/body_header.php';

?>

<html lang="en">

<!-- Change#Header -->

<!-- Change#Preloading -->

<!-- Change#BodyHeader -->

<!-- Change#Banner&RegistrationBanner -->
<?php
include('partials/banner.php');
include('partials/registration_banner.php');
?>

<section class="blog-posts grid-system">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            <?php 
            include_once('database/connections.php');
            // get if from URL and print blog ASK
            $blog = get_blog_all_by_id($_GET["blog"]);
            get_blog_all($blog->fetch());
            ?>
            <div class="col-lg-12">
              <div class="sidebar-item comments">
                <div class="sidebar-heading">
                  <h2><?= get_number_of_comments($_GET["blog"]) ?> comment</h2>
                </div>
                <div class="content">
                  <ul>
                    <?php 
                    get_commenst($_GET["blog"]);
                    ?>
                    <!-- <li class="replied">
                      <div class="author-thumb">
                        <img src="assets/images/comment-author-02.jpg" alt="">
                      </div>
                      <div class="right-content">
                        <h4>Thirteen Man<span>May 20, 2020</span></h4>
                        <p>In porta urna sed venenatis sollicitudin. Praesent urna sem, pulvinar vel mattis eget.</p>
                      </div>
                    </li>
                    <li>
                      <div class="author-thumb">
                        <img src="assets/images/comment-author-03.jpg" alt="">
                      </div>
                      <div class="right-content">
                        <h4>Belisimo Mama<span>May 16, 2020</span></h4>
                        <p>Nullam nec pharetra nibh. Cras tortor nulla, faucibus id tincidunt in, ultrices eget
                          ligula. Sed vitae suscipit ligula. Vestibulum id turpis volutpat, lobortis turpis ac,
                          molestie nibh.</p>
                      </div>
                    </li>
                    <li class="replied">
                      <div class="author-thumb">
                        <img src="assets/images/comment-author-02.jpg" alt="">
                      </div>
                      <div class="right-content">
                        <h4>Thirteen Man<span>May 22, 2020</span></h4>
                        <p>Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc,
                          gravida in erat sit amet, feugiat viverra leo.</p>
                      </div>
                    </li> -->
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="sidebar-item submit-comment">
                <div class="sidebar-heading">
                  <h2>Your comment</h2>
                </div>
                <div class="content">
                  <form id="comment" action="#" method="post">
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
        <!-- Change#SideBar -->
        <?php
        include('partials/sidebar.php');
        ?>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- Change#Footer&FooterScripts -->
<?php
include('partials/footer.php');
include('partials/footer_script.php');
?>

</body>

</html>