<?php
session_start();
 include_once('ManageProvince.php');
 include_once('ManageLigue.php');
 include_once('ManageClub.php');
 include_once('ManageArbitre.php');
 include_once('ManageAthlete.php');
 include_once('ManageCoach.php');
 include_once('ManageUser.php');

 $province= new ManageProvince();
 $ligue= new ManageLigue();
 $club= new ManageClub();
 $ManageArbitre = new ManageArbitre();
 $Athlete= new ManageAthlete();
 $coach = new ManageCoach();
 $user = new ManageUser();


?>