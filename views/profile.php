<?php
include_once '../helpers/http.php';
include_once '../config/Database.php';
include_once '../models/Profile.php';
session_start();
if(!isset($_SESSION['name'])) {
    redirect('../views/login.php');
    exit;
}
require_once 'layout/header.php';
$database = new Database();
$db = $database->connect();

// Instantiate Person object
$profile = new Profile($db);

 // Get ID
 $profile->id = $_SESSION['id'];
 // Read profile data from Database
 $profile->read_single();

?>
<body>

<div class="container-fluid ">
<div class="col-md-8 col-sm-8 col-xs-12 text-end m-4">
    <a href="../controllers/logout.php">Logout</a>
</div>
    <div class="row mx-auto">
        <div class="text-end col-md-4">
             <img src="../image/<?php if(isset($profile->image)) 
                                echo $profile->image.".jpg" ; else echo "profile.jpg";
             ?>" class="rounded-circle w-50" alt="...">
        </div>
       
        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <?php              
            echo "Welcome ".$_SESSION['name']; 
            ?><hr>
            <p class="fw-bold">About me</p>
             <?php              
            echo $profile->about;           
            ?>
        </div>
       
    </div>
</div>

<?php
require_once 'layout/footer.php'
?>