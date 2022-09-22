<?php
include_once("Script/_head.php");

$provinces = $province->ListeProvince();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FCHandball - Competitions</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/node_modules/@fortawesome/fontawesome-free/css/fontawesome.min.css">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php 
  include("menu.php");
  ?>

  <main id="main" style="margin-top: 150px;">

    <div class="container ">


    <div class="row">

    <div class="col-lg-2 mt-5 pt-3 shadow-sm">
    

    </div>


    <div class="col-lg-9 ml-1" id="main_menu">
 <!-- ======= About Section ======= -->
 <div class="province mt-5">
       <hr>
        <div class="section-title" data-aos="fade-left">
          <h6>Ajout Province</h6>
        </div>
        <form class="form-inline" method="post" action="Script/Province.php">
            <input class="form-control mr-sm-2" name="Province" type="search" placeholder="inserer la province ..." aria-label="Search" style="width:500px;">
            <button class="btn btn-outline-success" type="submit" name="valider">Enregister</button>
        </form>
      <hr>
      </div>
       
      <div class="listeProvince shadow-sm">

      <div class="d-flex justify-content-between">

        <div class="section-title" data-aos="fade">
          <h6>Liste Provinces</h6>
        </div>

        <form class="form-inline">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"> <i class="bx bx-search"></i></div>
              </div>
              <input type="text" class="form-control" id="inlineFormInputGroup" name="rechercheProvince" placeholder="rechercher le province...">          
            </div>
        </form>
        </div>

      <table class="table table-striped mb-3 pb-3">
        <thead>

        
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nom</th>
            <th scope="col">Operation</th>
          </tr>
        </thead>
        <tbody>

        <?php

        $num=0;
        foreach ($provinces as $province) { $num++; ?>
         

          <tr>
            <th scope="row"><?= $num ?></th>
            <td><?= $province->nom ?></td>
            <td>
                 <a href="Script/Province?operation='supp'&id=<?= $province->id_province ?>" class="twitter"><i class="bx bx-trash " style="color:red" ></i></a>
                 <a href="Script/Province?operation='edit'&id=<?= $province->id_province ?>" class="twitter"><i class="bx bx-edit"></i></a>
                 <a href="Script/Province?operation='detail'&id=<?= $province->id_province ?>" class="twitter"><i class="bx bx-show"></i></a>
            </td>
          </tr>


        <?php
        }
        ?>
                  
        </tbody>
        </table>


    
      </div>

      <div class="pagination mt-5">
      <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
      </div>

    </div>

    </div>

   


     
     
      </div>
  </main><!-- End #main -->

  <?php
    include("footer.php");
  ?>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>