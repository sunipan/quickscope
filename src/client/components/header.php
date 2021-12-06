<header>
  <nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand d-flex" href="home.php">
        <img src="img/crosshair.png" alt="" width="30" height="30" />
        <img src="img/font-logo.png" alt="" height="30" />
      </a>
      <a href="home.php" class="text-dark m-auto d-none d-lg-flex">
        <h2 class="m-0"><i class="bi bi-house-fill mx-auto house-color"></i></h2>
      </a>

      <div class="d-none d-md-flex search-form m-auto d-inline-block position-relative">
        <input id="mainSearch" class="form-control me-2 search-bar" type="search" placeholder="Search..." aria-label="Search"/>
        <div class="dropdown-content position-absolute d-block z-index:1">
          <ul class="main_results position-absolute d-block" style='height:90vh'>
          </ul>
        </div>
      </div>
      
      <?php
      if (!isset($_SESSION['user'])) {
        echo '<a href="login.php" class="d-none d-lg-flex text-decoration-none text-white btn btn-danger me-2">
                  Login
                </a>
                <a href="sign_up.php" class="d-none d-lg-flex text-decoration-none text-white btn btn-dark me-2">
                  Sign Up
                </a>';
        // If user isn't logged in, display normal menu icon
        echo '<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>';
      } else {
        // If user is logged in, display their profile pic as the icon
        echo '<div data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span id="avatar-span">
                  <img class="rounded-circle border border-3 border-danger" src="' . $_SESSION['avatar'] . '" width="40" height="40" alt="Profile Picture" />
                  <i class="bi bi-caret-down-fill"></i>
                </span>
              </div>';
      } ?>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr class="m-0" />
        <div class="offcanvas-body mt-0">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" href="my-profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create-post.php">Create a Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create-forum.php">Create a Forum</a>
            </li>
            <li class="nav-item dropdown">
              <?php if (isset($_SESSION['user'])) {
                // If user isn't logged in, display logout button
                echo '<li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                      </li>';
              } else {
                // If user is not logged in, display login button
                echo '<li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                      </li>';
              } ?>
            </li>
          </ul>
          <div class="dropdown">
            <form class="d-flex d-md-none">
              <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search">
              <ul class="main_results" class="list-group my-2" style="position:absolute; z-index: 1">
              </ul>
            </form>
          </div>
        </div>
      </div>
    </div>
    
 
  </nav>
</header>


