<!DOCTYPE html>
<?php

include __DIR__ . '/functions/functions.php';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/body_header.php';
$blog_id = 1;

// if user delete getter from url show him first blog
if (!empty($_GET["blog"])) {
  $blog_id = $_GET["blog"];
}

sql_views_update($_GET["blog"]);

$_SESSION["blog_id"] = $blog_id;
?>

<html lang="en">

<!-- Banner & Registration Banner -->
<?php
include_once('partials/banner.php');
include_once('partials/registration_banner.php');
?>

<body>
  <!-- Blog -->
  <section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              <?php
              get_blog_all($blog_id);
              ?>
              <div class="col-lg-12">
                <div class="sidebar-item comments">
                  <!-- Comments -->
                  <div class="sidebar-heading">
                    <h2>
                      <?= sql_get_number_of_comments($blog_id) ?> comment
                    </h2>
                  </div>
                  <div class="content">
                    <ul>
                      <?php
                      get_commenst($blog_id);
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- Create comments -->
              <?php
              get_create_commenst($blog_id);
              ?>
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