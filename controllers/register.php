<?php
include_once '../config/Database.php';
include_once '../models/Person.php';
include_once '../models/Profile.php';
include_once '../helpers/http.php';

if (isset($_REQUEST['action'])&& isset($_REQUEST['email']) && isset($_REQUEST['password1'])
    && $_REQUEST['password1'] ==$_REQUEST['password2'] ) {
        //check if email format
        $email = $_REQUEST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
         //redirect to register page with an error
         $error = "Wrong email format";
         redirect('../views/register.php?error='.$error);
         exit();
        }

     
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate Person object
        $person = new Person($db);

        // Get form data

        $person->firstname =$_POST['firstname'];
        $person-> middlename =$_POST['middlename'];
        $person->lastname =$_POST['lastname'];
        $person->email =$_POST['email'];
        $person->password =$_POST['password1'];
        $person->phone =$_POST['phone'];
        $person->dob =$_POST['dob'];

        // Create new user
        if($person->createNew()) {
        // Create inital user's Profile
        $profile = new Profile($db); 
        $profile->id= $person->id;
        $profile->about= "I am ". $person->firstname;

        $profile->createNew();

        //Set user's sessions
        session_start();
        $_SESSION['name'] = $person->firstname;
        $_SESSION['id'] = $person->id;
            
        //redirect to profile page
        redirect('../views/profile.php');
        } else {
            //redirect to register page with an error
            $error = "Email already exist";
            redirect('../views/register.php?error='.$error);
        }

      
}
else{
    //redirect to profile page with error
    $error = "All fields are compulsory";     
    redirect('../views/register.php?error='.$error);

}
?>