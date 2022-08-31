<?php
require_once 'layout/header.php'
?>
<body>

    <div class="container-fluid ">
        <div class="row">

            <div class="col-md-4 col-sm-8 col-xs-12 mx-auto">
                <!-- form start-->
                <form class="form-container" action="../controllers/login.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail">Email</label><img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPJJREFUSEvtldsRwUAUhr9UgAqUgEoogQ6oIDqhBDqhAypABcyf2TVn4uQikZeMfcrsnvPf9pKEjkfSMT79IlgAKTBtGdsF2AAH4diItDBuCR7bT8AsT/AMq0dg3pDI9mbirYNIoDnFtQcGNYkewDLEYnFcghFwB4aBpMqNVAs89tyCqEIHKlzFTSpxY1ULU653Qdg7HS+imIpOgYg8N3nVAhaBHYUObJHnRuvZEXRUf03gudGc9sdT3ZhAjdGNvm3WRQetVkQ1T6lb9ieoTO8jol8+duf4KtuLpouyBSaV2soLrsDae65b4vrt/fpldhLRC6AYNhngkXrwAAAAAElFTkSuQmCC" />

                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAOBJREFUSEvtlW0NwjAURc8UEBQASgAHOAAUEBQADnAADkACKAEc4AByky6spV9bsoSE9c+ape+e19v2vYKWR9GyPrmAGbACJiahC7AD9I2OHMARmAdUBNnGCCmAMj8ZgTVwNvMFsDHzaWwnKYAsGAMS3zuZKnNBrhXrvjaTArxMRB94OtFD4Gb+BXVyAaF1ZQJ/BtBdPwDyuM64A0v3Rvm808JBHeXKWsWOqrE+QHlwDRl2degAPhstVzqLftMiVc1ew0fwcCuA75BVKtTF6r5miasRWW00Va4bbuQT1jrgDS0YKBnLsqiKAAAAAElFTkSuQmCC"/>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="Submit" class="btn btn-primary" name ="action">Login</button>
                    </div>
                    <div class="text-center bg-light col-8 m-2  mx-auto">
                        Forgot your password
                    </div>

                </form>
                <!--form end-->

            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 mx-auto text-center p-2">
                    <a type="Submit" class="btn btn-primary" href="register">New User? Sign up</a>
                </div>
            </div>
        </div>
    </div>



    </body>
    <?php
require_once 'layout/footer.php'
?> 