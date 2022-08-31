<?php
include_once '../config/Database.php';
include_once '../models/Person.php';
include_once '../helpers/http.php';

if (isset($_REQUEST['action'])) {
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate Person object
$person = new Person($db);

 // Get ID
 $person->email = $_POST['email'];
 $person->password = $_POST['password'];

 // Read person data from Database
 $person->login();
//Set user's sessions
  session_start();
  $_SESSION['name'] = $person->firstname;
  $_SESSION['id'] = $person->id;
    
 //redirect to profile page
  redirect('../views/profile.php');



}
?>