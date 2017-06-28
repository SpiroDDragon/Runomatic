<?php

include 'header.php';

//user

if ($_SESSION['priv']=='user') {

    echo "<section class='main-container'>
            <article>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg-2'></div>
                        <div class='col-lg-8'>
                            <h2 class='signupform'>Please input Date, Distance and Time!</h2>
                            <form action='includes/input_data.inc.php' method='POST'>
                                <div class='table-responsive'>
                                    <table class='table-bordered'>
                                        <tr>
                                            <th class='col-md-2 text-center'>Date:</th>
                                            <th class='col-md-2 text-center'>Distance in meters:</th>
                                            <th class='col-md-2 text-center'>Hours:</th>
                                            <th class='col-md-2 text-center'>Minutes:</th>
                                            <th class='col-md-2 text-center'>Seconds:</th>
                                        </tr>
                                        <tr>
                                            <td><input class='form-control' type='date' name='date' required></td>
                                            <td><input class='form-control' type='number' name='dis' required></td>
                                            <td><input class='form-control' type='number' name='hrs'></td>
                                            <td><input class='form-control' type='number' name='min'></td>
                                            <td><input class='form-control' type='number' name='sec' required></td>
                                            <td><button class='btn btn-primary btn-block' type='submit'>RUN!!</button></td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class='col-lg-2'></div>
                    </div>
                </div>
            </article>";
    echo "<article class='main-container'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-2'></div>
                    <div class='col-lg-8'>
                        <h2 class='signupform'>Your running records!!!</h2>";

                        $sql = "SELECT * FROM user_data WHERE uid='".$_SESSION['uid']."' ORDER BY date DESC";
                        $result = mysqli_query($connection, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<div class='table-responsive pre-scrollable'>
                                        <table class='table-bordered'>
                                             <tr>
                                                 <th class='col-md-2 text-center'>Date:</th>
                                                 <th class='col-md-2 text-center'>Distance in meters:</th>
                                                 <th class='col-md-2 text-center'>Time:</th>
                                                 <th class='col-md-2 text-center'>Average speed:</th>
                                             </tr>";
                            while($row = mysqli_fetch_assoc($result)) {

                                $time = $row['hrs'] * 3600 + $row['min'] * 60 + $row['sec'];
                                $speed = $row['dis']/$time * 3600 / 1000;
                                $date = date("d-m-Y", strtotime($row['date']));

                                echo "<form action='edit_delete.inc.php' method='POST'>
                                            <tr>
                                              <td hidden><input class='form-control' type='number' name='data_id' value='".$row['data_id']."'></td>
                                              <td class='text-center'>".$date."</td>
                                              <td class='text-center'>".$row['dis']." meters</td>
                                              <td class='text-center'>".$row['hrs'].":".$row['min'].":".$row['sec']."</td>
                                              <td class='text-center'>".round($speed, 2)." km/h</td>
                                              <td><button class='btn btn-success btn-block' type='submit' name='edit'>EDIT</button></td>
                                              <td><button class='btn btn-danger btn-block' type='submit' name='delete'>DELETE</button></td>
                                            </tr>
                                          </form>";
                            }
                            echo "</table>";
                            echo "</div>";
                        } else {
                            echo "<h2 class='signupform'>You have no running records! Yet!!!</h2>";
                        }
                        echo "<div class='col-lg-2'></div>
                    </div>
                </div>
            </div>
        </article>
    </section>";



//user manager


} elseif ($_SESSION['priv']=='user_manager') {

    echo "<section class='main-container'>
            <article>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg-2'></div>
                        <div class='col-lg-8'>
                            <h2 class='signupform'>Add a new user!</h2>
                            <form action='includes/signup.inc.php' method='POST'>
                                <div class='table-responsive'>
                                    <table class='table-bordered'>
                                        <tr>
                                            <th class='col-md-3 text-center'>Firstname</th>
                                            <th class='col-md-3 text-center'>Lastname</th>
                                            <th class='col-md-3 text-center'>Username</th>
                                            <th class='col-md-3 text-center'>Password</th>
                                        </tr>
                                        <tr>
                                            <td><input class='form-control' type='text' name='fname' required></td>
                                            <td><input class='form-control' type='text' name='lname' required></td>
                                            <td><input class='form-control' type='text' name='uid'></td>
                                            <td><input class='form-control' type='password' name='pwd'></td>
                                            <td><button class='btn btn-primary btn-block' type='submit'>Add user</button></td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class='col-lg-2'></div>
                    </div>
                </div>
            </article>";
    echo "<article class='main-container'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-2'></div>
                    <div class='col-lg-8'>
                        <h2 class='signupform'>Users in database!</h2>";

    $sql = "SELECT * FROM users WHERE privilege='user' ORDER BY id DESC";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive pre-scrollable'>
                                        <table class='table-bordered'>
                                             <tr>
                                                 <th class='col-md-3 text-center'>Firstname</th>
                                                 <th class='col-md-3 text-center'>Lastname</th>
                                                 <th class='col-md-3 text-center'>Username</th>
                                                 <th class='col-md-3 text-center'>Password</th>
                                             </tr>";
        while($row = mysqli_fetch_assoc($result)) {

            echo "<form action='edit_delete_user.php' method='POST'>
                     <tr>
                       <td hidden><input type='number' name='id' value='".$row['id']."'></td>
                       <td class='text-center'>".$row['fname']."</td>
                       <td class='text-center'>".$row['lname']."</td>
                       <td class='text-center'>".$row['uid']."</td>
                       <td class='text-center'>".$row['pwd']."</td>
                       <td><button class='btn btn-success btn-block' type='submit' name='edit'>EDIT</button></td>
                       <td><button class='btn btn-danger btn-block' type='submit' name='delete'>DELETE</button></td>
                     </tr>
                  </form>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<h2 class='signupform'>There are no users in database!</h2>";
    }
    echo "<div class='col-lg-2'></div>
                    </div>
                </div>
            </div>
        </article>
    </section>";

//administrator

} elseif ($_SESSION['priv']=='admin') {

    echo "<section class='main-container'>
            <article>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg-2'></div>
                        <div class='col-lg-8'>
                            <h2 class='signupform'>Add a new user!</h2>
                            <form action='includes/signup.inc.php' method='POST'>
                                <div class='table-responsive'>
                                    <table class='table-bordered'>
                                        <tr>
                                            <th class='col-md-3 text-center'>Firstname</th>
                                            <th class='col-md-3 text-center'>Lastname</th>
                                            <th class='col-md-3 text-center'>Username</th>
                                            <th class='col-md-3 text-center'>Password</th>
                                        </tr>
                                        <tr>
                                            <td><input class='form-control' type='text' name='fname' required></td>
                                            <td><input class='form-control' type='text' name='lname' required></td>
                                            <td><input class='form-control' type='text' name='uid'></td>
                                            <td><input class='form-control' type='password' name='pwd'></td>
                                            <td><button class='btn btn-primary btn-block' type='submit'>Add user</button></td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class='col-lg-2'></div>
                    </div>
                </div>
            </article>";
    echo "<article class='main-container'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-2'></div>
                    <div class='col-lg-8'>
                        <h2 class='signupform'>Users in database!</h2>";

    $sql = "SELECT * FROM users ORDER BY id ASC";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive pre-scrollable'>
                                        <table class='table-bordered'>
                                             <tr>
                                                 <th class='col-md-3 text-center'>Firstname</th>
                                                 <th class='col-md-3 text-center'>Lastname</th>
                                                 <th class='col-md-3 text-center'>Username</th>
                                                 <th class='col-md-3 text-center'>Password</th>
                                             </tr>";
        while($row = mysqli_fetch_assoc($result)) {

            echo "<form action='edit_delete_user.php' method='POST'>
                     <tr>
                       <td hidden><input type='number' name='id' value='".$row['id']."'></td>
                       <td class='text-center'>".$row['fname']."</td>
                       <td class='text-center'>".$row['lname']."</td>
                       <td class='text-center'>".$row['uid']."</td>
                       <td class='text-center'>".$row['pwd']."</td>
                       <td><button class='btn btn-primary btn-block' type='submit' name='data'>DATA</button></td>
                       <td><button class='btn btn-success btn-block' type='submit' name='edit'>EDIT</button></td>
                       <td><button class='btn btn-danger btn-block' type='submit' name='delete'>DELETE</button></td>
                     </tr>  
                  </form>
                       
                     
                  ";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<h2 class='signupform'>There are no users in database!</h2>";
    }
    echo "<div class='col-lg-2'></div>
                    </div>
                </div>
            </div>
        </article>
    </section>";

}
?>


</body>
</html>