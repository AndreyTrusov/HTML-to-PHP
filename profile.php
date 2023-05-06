<?php
include_once 'partials/header.php';
include_once 'partials/body_header.php';
include_once 'database/connections.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
    exit();
}
?>

<body>
    <div class="container" style="margin-top: 200px;">
        <div class="row">
            <div class="col">
                <form id="blog" action="database/update_profile.inc.php" method="POST">
                    <div class="mb-3">
                        <label style="color: #f48840;" for="formGroupExampleInput" class="form-label">Change user
                            name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput"
                            name="update_profile_username" value="<?php sql_get_user_name($_SESSION["user_id"]) ?>">
                    </div>
                    <div class="mb-3">
                        <label style="color: #f48840;" for="formGroupExampleInput2" class="form-label">Change nick
                            name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2"
                            name="update_profile_nickname"
                            value="<?php echo sql_get_user_nickname($_SESSION["user_id"]) ?>">
                    </div>
                    <button style="background-color: #f48840; color: white;" type="submit" class="btn ">
                        Update profile</button>
                </form>
                <br>
                <hr>
                <br>
                <form id="blog" action="database/update_password.inc.php" method="POST">
                    <div class="row mb-3">
                        <label style="color: #f48840;" for="colFormLabelSm"
                            class="col-sm-2 col-form-label col-form-label-sm">Change password</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                name="update_profile_password" placeholder="type new password">
                        </div>
                        <div class="col-sm-2">
                            <button style="background-color: #f48840; color: white;" type="submit" class="btn btn-sm ">
                                Update password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section>

    </section>

    <?php
    include_once('partials/footer.php');
    include_once('partials/footer_script.php');
    ?>

</body>

</html>