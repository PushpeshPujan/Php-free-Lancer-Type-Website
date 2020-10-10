<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand text-dark" href="../home.php">CLancer</a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-dark" href="../how_it_work.php">How it works</a>
        </li>
    </ul>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['email'])&& $_SESSION['email']!=''){?>

            <li class='nav-item'>
                <a class='nav-link text-dark' href='logout.php'>Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="browse.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-warning btn-md mr-2" href="manage.php">Manage</a>
            </li>
            <?php  }
                else { ?>
            <li class='nav-item'>
                <a class='nav-link text-dark' href='login.php'>Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="signup.php">SignUp</a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="btn btn-danger btn-md" href="post.php">Post a project</a>
            </li>
        </ul>
    </div>
</nav>
