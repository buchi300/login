<?php
require_once 'layout/header.php'
?>
<body>

<div class="container-fluid ">
    <div class="row">
       
        <div class="col-md-4 col-sm-4 col-xs-12 mx-auto">
            <?php 
            if(isset($_REQUEST['error']))
             echo $_REQUEST['error'];
            ?>
            <!-- form start-->
            <form class="form-container" action="../controllers/register.php" method="post" >
            <div class="form-group">
                    <label for="inputFirstname">First Name</label>
                    <input type="text"  class="form-control" name="firstname" required  placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="inputMiddlename">Middle Name</label>
                    <input type="text"  class="form-control"name="middlename" required   placeholder="Middle Name">
                </div>
                <div class="form-group">
                    <label for="inputLastname">Last Name</label>
                    <input type="text"  class="form-control" name="lastname" required  placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email"  class="form-control" name="email"  id="inputEmail" required  placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="inputphone">Phone Number</label>
                    <input type="phone"  class="form-control" name="phone"  id="inputPhone"  required placeholder="Phone Number">
                </div>                 
                <div class="form-group">
                    <label for="birthday">Birthday</label><br>
                    <input type="date" id="birthday" name="dob" required>
                </div>

                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password"  class="form-control" name="password1"  id="inputPassword"  required placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password Confirm</label>
                    <input type="password"  class="form-control" name="password2"  id="inputPassword" required  placeholder="Password Confirm">
                </div>
                
                <div class="d-grid gap-2 m-2">
                <button type="Submit" class="btn btn-primary" name="action">Submit</button>
                </div>
              
               
            </form>
            <!--form end-->
            
        </div>
       
    </div>
</div>

</body>
<?php
require_once 'layout/footer.php'
?>