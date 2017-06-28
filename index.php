<?php

include 'header.php';
?>
 <section class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <h2 class="signupform">Please fill out the Sign Up form!</h2>
                    <form action="includes/signup.inc.php" method="POST">
                        <div class="form-group">
                            <label for="fname">Firstname:</label>
                            <input class="form-control" type="text" name="fname" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Lastname:</label>
                            <input class="form-control" type="text" name="lname" required>
                        </div>
                        <div class="form-group">
                            <label for="uid">Username:</label>
                            <input class="form-control" type="text" name="uid" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input class="form-control" type="password" name="pwd" required>
                        </div>
                        <button class="btn btn-success btn-lg" type="submit">SIGN UP</button>
                    </form>
                    <div id="userSignupFormResponseMessage"></div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
 </section>

</body>
</html>