<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <h2>Andrey Blog<em>.</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <?php
                    include_once('database/connections.php');
                    $menu = sql_get_menu_all();
                    get_menu($menu);
                    if (isset($_SESSION["user_id"])) {
                        echo '<li class="nav-item"><a class="nav-link" href="posts_menu.php">Post Menu</a></a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>