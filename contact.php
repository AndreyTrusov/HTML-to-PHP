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

<!-- Change#Banner -->
<?php
include('partials/banner.php');
?>

<section class="contact-us">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="down-contact">
          <div class="row">
            <!-- Change#feedbach&info -->
            <?php
            include('partials/feedback_message.php');
            include('partials/contact_information.php');
            ?>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div id="map">
          <iframe
            src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
            width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
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