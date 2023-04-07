<nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="menu.php"><i class="fa fa-home"></i> Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="user.php"><i class="fa fa-users"></i> Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="entropot.php"><i class="fa fa-briefcase"></i> Entropots</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="agent.php"><i class="fa fa-user"></i> Agents</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Agents</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <ul>
          <a class="nav-link active text-warning card bg-dark" href="" tabindex="-1"><?php echo 'BIENVENUE   '.$_SESSION["nom"].' '.$_SESSION["prenom"];?></a>
      </ul>
    </div>
  </div>
  <form class="d-flex">
    <button class="btn btn-outline-danger"><a href="logout.php" class="text-white" style="text-decoration: none;"><i class="fa fa-power-off"></i> Déconnexion</a></button>
  </form>
</nav>


      <!-- autre navbar -->
<!-- <nav class="navbar navbar-dark bg-dark fixed-top " style="padding:0;">
    <div class="container-fluid mt-2 mb-2">
        <div class="col-lg-12">
            <div class="col-md-1 float-left" style="display: flex;">
                <div class="logo">
                    <i class="fa fa-poll-h"></i>
                </div>
            </div>
            <div class="col-md-2 float-right text-white">
                <a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
            </div>
        </div>
    </div>
</nav> -->