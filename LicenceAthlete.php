
  <?php

    include_once("Script/_head.php");


    $Athletes =$Athlete->AthleteList();
    $licenceAthletes=$licenceAthlete->ListeLicenathlete();
   
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
    <ul class="nav flex-column justify-content-center ">
  <li class="nav-item">
    <a class="nav-link active" href="Athlete">Athlète</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Club.php">Club</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Ligue.php">Ligue</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Coach.php">Coach</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Arbitre.php">Arbitre</a>
  </li>
  <li class="nav-item">
    <a class="nav-link bg-secondary" style="color:white" href="LicenceAthlete.php">License Athlète</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="LicenceCoach.php">License Coach</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="CarteService.php">Carte de service</a>
  </li>
</ul>

    </div>


    <div class="col-lg-9 ml-1" id="main_menu">
 <!-- ======= About Section ======= -->
 <div class="Ligue mt-5">
       <hr>
        <div class="section-title" data-aos="fade-left">
          <h6>Ajout Ligue</h6>
        </div>
        <!-- `date_livraison`, `date_creation`, `durée`, `id_athlete` -->
        <form class="form-inline" method="post" action="Script/LicenceAthlete.php">

            <div class="input-group mb-2 mr-1">
              <div class="input-group-prepend">
                <div class="input-group-text"> <i class="bx bx-calendar-check"></i></div>
              </div>
              <input type="date" class="form-control" id="inlineFormInputGroup" name="DateLivraison" placeholder="la date de livraison...">
            </div>

            <div class="input-group mb-2 mr-1">
              <div class="input-group-prepend">
                <div class="input-group-text"> <i class="bx bx-calendar-check"></i></div>
              </div>
              <input type="date" class="form-control" id="inlineFormInputGroup" name="DateCreation" placeholder="la date de creation...">
            </div>

            <div class="input-group mb-2 mr-1">
              <div class="input-group-prepend">
                <div class="input-group-text"> <i class="bx bx-user"></i></div>
              </div>
              <input type="number" class="form-control" id="inlineFormInputGroup" name="DureeLicence" placeholder="Durée Licence...">

            </div>

            <div class="input-group mb-2 mr-2 align-items-center">

              <span span class="small">Athlete</span>
              <div class="input-group-prepend">
                <div class="input-group-text"> <i class="bx bx-football"></i></div>
              </div>

              <select name="Athlete" id="" class="form-control">
                  <?php

                    foreach ($Athletes as $Athlete) {?>

                    <option value="<?= $Athlete->id_athlete ?>"><?php echo $Athlete->prenom_athlete . " ". $Athlete->noms_athlete; ?></option>

                  <?php
                  }
                  ?>
              </select>
              
              <button class="btn btn-outline-success ml-2" name="enregistrer" type="submit">Enregister</button>
            </div>
    
        </form>

      <hr>
      </div>
       
      <div class="listeLigue shadow-sm">

      <div class="d-flex justify-content-between">

        <div class="section-title" data-aos="fade">
          <h6>Liste Ligues</h6>
        </div>

        </div>

      
      <table class="table table-striped mb-3 pb-3" data-aos="fade-left" data-aos-delay="200">
        <thead>
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Date Livraison</th>
            <th scope="col">Date Création</th>
            <th scope="col">Durée</th>
            <th scope="col">Athlete</th>
          </tr>
        </thead>
        <tbody>
        <?php

        $num=0;
        foreach ($licenceAthletes as $licenceAthlete) { $num++; ?>
          <tr>
            <th scope="row"><?= $num ?></th>
            <td><?= $licenceAthlete->date_livraison ?></td>
            <td><?= $licenceAthlete->date_creation ?></td>
            <td><?= $licenceAthlete->durée ?></td>
            <td><?= $licenceAthlete->id_athlete ?></td>
            <td>
                <a href="Script/LicenceAthlete?operation=supp&id=<?= $licenceAthlete->id_licence ?>" class="twitter"><i class="bx bx-trash " style="color:red" ></i></a>
                <a href="Script/LicenceAthlete?operation=edit&id=<?= $licenceAthlete->id_licence ?>" class="twitter"><i class="bx bx-edit"></i></a>
                <a href="Script/LicenceAthlete?operation=detail&id=<?= $licenceAthlete->id_licence ?>" class="twitter"><i class="bx bx-show"></i></a>
            </td>
          </tr>


          <?php
          } ?>
         
        </tbody>
        </table>


     

      </div>

      <div class="pagination">
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