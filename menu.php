


<?php
include_once("Script/_head.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">

    <title>FCHandball - competition</title>
</head>
<body>
    <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center shadow-sm">
    <div class="container">
      <div class="header-container d-flex align-items-center ">
        <div class="logo mr-auto">
          <a href="index.php"><img src="assets/img/logo.png" alt="photo"></a>
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>

          <?php if(isset($_SESSION) && !empty($_SESSION)){?>   <li><a href="accueil.php">Accueil</a></li> <?php } ?>
            <li><a href="utilisateur.php">Utilisateurs</a></li>
            <li><a href="athlete.php">Création</a></li>
            <li><a href="province.php">Provinces</a></li>
            <li><a href="contact.php">Nous contacter</a></li>

            <?php if(isset($_SESSION)&& !empty($_SESSION)){?>   <li><a href="Script/User.php?operation=deconnexion" class="btn btn-success rounded-pill font-weight-bolder text-white mr-2">Deconnexion</a></li> <?php } ?>

            <!--<li class="drop-down"><a href="">Province</a>
              <ul>
                <li><a href="Province.php">Kinshasa</a>
                <li><a href="Ligue.php">Katanga</a>
                <li><a href="Ligue.php">Bandundu</a>
                <li><a href="connexion.php">Connexion</a></li>
              </ul> 
            </li>-->

            
          
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->
</body>
</html>