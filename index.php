<!-- TODO: img to db / aply filter / create comments to blogs / blog post -->

<!DOCTYPE html>
<?php

include __DIR__ . '/functions/functions.php';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/body_header.php';

?>

<html lang="en">

<!-- Change#Header -->
<!-- Change#Preloading -->

<!-- Change#BodyHeader -->

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
  <div class="container-fluid">
    <div class="owl-banner owl-carousel">
      <!-- Change#takeBlogsFromSql -->
      <?php
      include('database/connections.php');
      $blogs = get_blogs_all();
      get_blog_baner($blogs);
      ?>
    </div>
  </div>
</div>
<!-- Banner Ends Here -->

<!-- Change#RegistrationBanner -->
<?php
include('partials/registration_banner.php');
?>

<section class="blog-posts">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            <!-- Change#takeBlogsFromSql -->
            <?php
            // we alredy does this onse / change it
            $blogs = get_blogs_all();
            get_blog_intro($blogs);
            ?>

            <div class="col-lg-12">
              <div class="main-button">
                <a href="blog.html">View All Posts</a>
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