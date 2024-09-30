
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Be-Pro</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        
        <li class="nav-item dropdown"> 
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
          <?php
          if(isset($_SESSION['username']))
          {


            include "include/functions.php";
            $categories = getAllCategories();
if ($categories !=null)
{
  foreach($categories as $categorie){
    print '<li><a class="dropdown-item" href="#">'.$categorie['categoryname'].'</a></li>';
  }
}
else
{
  print '<li class="nav-item">
  <a class="nav-link active">there is no categorie found please add one a least</a>
</li>';


}


          }
         

          ?>
     
          </ul>
        </li>
        <?php if(isset($_SESSION['username'])){

          print '<li class="nav-item">
                    <a class="nav-link active" href="profile.php">Profile</a>
                  </li>';




        }
        else{
          print'<li class="nav-item">
                    <a class="nav-link active" href="login.php">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="signup.php">Sign-Up</a>
                  </li>';
        }
         ?>
        
      </ul>
      <form class="d-flex" action="index.php" method="POST">
    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<?php 
if( isset($_SESSION['username'])){



  print'<a href="logout.php" class="btn btn-primary">Logout</a>';
}



?>

  





    </div>
  </div>
</nav>