
<nav class="navbar navbar-expand-lg bg-body-tertiary titre-brand ml-3">
  <div class="container-fluid">
    <a class="navbar-brand  ms-5" href="#">Article<span class="tsite">.com<span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto d-flex justify-content-center mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="articles.php">Home</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link active" aria-current="page" href="about.php">About</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link active" aria-current="page" href="myartice.php">myArticles</a>
        </li>
        <?php if(isset($_SESSION['Fullname'])){?>
        <li class="nav-item dropdown ms-4">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['Fullname'] ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profile.php?action=view">Profile</a></li>
            <li><a class="dropdown-item" href="profile.php?action=Editprofile">Edit Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php } ?>
      </ul>
        <?php if(!isset($_SESSION['Fullname'])){
           echo '<a href="login.php" class="btn btn-primary linklogin" role="button">Login</a>';
        }?>
    </div>
  </div>
  </div>
</nav>
