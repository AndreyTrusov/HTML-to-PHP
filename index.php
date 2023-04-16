<!-- TODO: img to db / aply filter / create comments to blogs / blog post -->

<!DOCTYPE html>
<?php

include __DIR__ . '/functions/functions.php';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/body_header.php';

?>

<html lang="en">
<div class="main-banner header-text">
  <div class="container-fluid">
    <div class="owl-banner owl-carousel">
      <?php
      // change it
      include('database/connections.php');
      $blogs = sql_get_blogs_all("baner");
      get_blog_baner($blogs);
      ?>
    </div>
  </div>
</div>

<!-- Registration banner -->
<?php
include('partials/registration_banner.php');
?>

<!-- List of blogs -->
<section class="blog-posts">
  <div class="container">
    <h1>Blogs filtered by number of views:</h1>
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            <?php
            // we alredy does this onse / change it
            $blogs = sql_get_blogs_all("intro");
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
        <!-- Sidebar -->
        <?php
        include('partials/sidebar.php');
        ?>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- Footer & FooterScripts -->
<?php
include('partials/footer.php');
include('partials/footer_script.php');
?>

</body>

</html>