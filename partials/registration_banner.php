<?php
if (!isset($_SESSION["user_id"])) {
  echo '
  <section class="call-to-action">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="main-content">
          <div class="row">
            <div class="col-lg-8">
              <span>Začnite blogovať hneď teraz</span>
              <h4>Zaregistrujte sa na stránke, aby ste mohli zanechať komentáre a pridať svoje blogy</h4>
            </div>
            <div class="col-lg-4">
              <div class="main-button">
                <a href="signup.php" target="_parent">Zaregestruj sa!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  ';
}
?>