<nav class="navbar sticky-top ziad-navbar-homepage navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#"><span>Z</span>iad</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse justify-right navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav" id="navTop">
                <li class="nav-item"><a href="#home" class="nav-link"><span>Home</span></a></li>
                <li class="nav-item"><a href="#about-me" class="nav-link"><span>About me</span></a></li>
                <li class="nav-item"><a href="resume.php" class="nav-link"><span>Resume</span></a></li>
                <li class="nav-item"><a href="#portfolio" class="nav-link"><span>Portfolio</span></a></li>
                <li class="nav-item"><a href="blog.php" class="nav-link"><span>Blog</span></a></li>
                <li class="nav-item mb-2 mb-lg-0 mr-lg-2"><a href="contact.php" class="nav-link"><span>Contact me</span></a></li>
                <?php
                if(!isset($_SESSION['id'])){
                    echo '<li class="nav-item"><a href="login.php" class="nav-link"><span>Login</span></a></li>
                              <li class="nav-item"><a href="register.php" class="nav-link"><span>Register</span></a></li>';
                } else {
                    echo '<li class="nav-item mb-2 mb-lg-0 mr-lg-2"><a href="profile.php" class="btn btn-dark text-white nav-link"><span class="pl-2 pr-2">Profile</span></a></li>
                          <li class="nav-item"><a href="includes/logout.inc.php" class="btn btn-danger text-white nav-link"><span class="pl-2 pr-2">Logout</span></a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>