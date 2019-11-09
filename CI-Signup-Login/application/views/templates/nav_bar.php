<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <h1 class="navbar-brand">Assignment</h1>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Signup') ?>">Sign up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Login') ?>">Login</a>
      </li>
      <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'logged in')
      {?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('Logout') ?>">Logout</a>
            </li>
      <?php } ?>
    </ul>
  </div>
</nav>