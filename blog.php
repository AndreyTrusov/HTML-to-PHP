<!DOCTYPE html>
<?php

include __DIR__ . '/functions/functions.php';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/body_header.php';

?>
<html lang="en">

<!-- Change#Header -->

<!-- Change#Preloading -->
<?= $preloading ?>

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
            get_blogs_all_for_blog_page()
            ?>
            
            <!-- <div class="col-lg-12">
              <ul class="page-numbers">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
              </ul>
            </div> -->
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
</section>

<!-- Change#Footer&FooterScripts -->
<?php
include('partials/footer.php');
include('partials/footer_script.php');
?>

</body>

</html>