<?php
session_start();
 include_once('ManageProvince.php');
 include_once('ManageLigue.php');
 include_once('ManageClub.php');
 include_once('ManageArbitre.php');
 include_once('ManageAthlete.php');
 include_once('ManageCoach.php');
 include_once('ManageUser.php');
 include_once('ManageArbitre.php');
 include_once('ManageCarteservice.php');
 include_once('ManageLicenceAthlete.php');
 include_once('ManageLicenceCoach.php');

 $province= new ManageProvince();
 $ligue= new ManageLigue();
 $club= new ManageClub();
 $Athlete= new ManageAthlete();
 $coach = new ManageCoach();
 $user = new ManageUser();
 $arbitre = new ManageArbitre();
 $carteService = new ManageCarteservice();
 $licenceAthlete = new ManageLicenceAthlete();
 $licenceCoach = new ManageLicenceCoach();


?>