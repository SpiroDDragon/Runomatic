<?php

include 'header.php';

if (isset($_POST['edit'])) {
    echo "<section class='main-container'>
            <article class='main-container'>
               <div class='container'>
                  <div class='row'>
                     <div class='col-lg-2'></div>
                     <div class='col-lg-8'>
                       <h2 class='signupform'>User you wish to edit!!!</h2>";

    $sql = "SELECT * FROM users WHERE id='".$_POST['id']."'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive'>
                <table class='table-bordered'>
                  <tr>
                     <th class='col-md-3 text-center'>UserID</th>
                     <th class='col-md-3 text-center'>Firstname</th>
                     <th class='col-md-3 text-center'>Lastname</th>
                     <th class='col-md-3 text-center'>Username</th>
                     <th class='col-md-3 text-center'>Password</th>
                  </tr>";
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>
                   <td class='text-center'>".$_POST['id']."</td>
                   <td class='text-center'>".$row['fname']."</td>
                   <td class='text-center'>".$row['lname']."</td>
                   <td class='text-center'>".$row['uid']."</td>
                   <td class='text-center'>".$row['pwd']."</td>
                  </tr>";
        }
        echo "</table>            
            </div>
           <div class='col-lg-2'></div>
          </div>
         </div>
        </div>
       </article>";
    }

    echo '<article class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <h2 class="signupform">Edit user data!</h2>
                    <form action="includes/edit_user.inc.php" method="POST">
                        <div class="table-responsive">
                            <table class="table-bordered">
                                <tr>
                                    <th class="col-md-1 text-center">UserID</th>
                                    <th class="col-md-3 text-center">Firstname</th>
                                    <th class="col-md-3 text-center">Lastname</th>
                                    <th class="col-md-3 text-center">Username</th>
                                    <th class="col-md-3 text-center">Password</th>
                                </tr>
                                <tr>
                                    <td><input class="form-control" readonly type="number" name="id" value="'.$_POST['id'].'" ></td>
                                    <td><input class="form-control" type="text" name="fname"></td>
                                    <td><input class="form-control" type="text" name="lname"></td>
                                    <td><input class="form-control" type="text" name="uid"></td>
                                    <td><input class="form-control" type="text" name="pwd"></td>
                                    <td><button class="btn btn-success" type="submit" name="edit_data">EDIT</button></td>
                                    <td><button class="btn btn-danger" type="submit" name="cancel_edit">CANCEL</button></td>

                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </article>';

} elseif (isset($_POST['data'])) {

    echo "<article class='main-container'>
                   <div class='container'>
                      <div class='row'>
                         <div class='col-lg-2'></div>
                         <div class='col-lg-8'>
                           <h2 class='signupform'>User data for...</h2>";

    $sql = "SELECT * FROM users WHERE id='".$_POST['id']."'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive'>
                    <table class='table-bordered'>
                      <tr>
                         <th class='col-md-3 text-center'>UserID</th>
                         <th class='col-md-3 text-center'>Firstname</th>
                         <th class='col-md-3 text-center'>Lastname</th>
                         <th class='col-md-3 text-center'>Username</th>
                         <th class='col-md-3 text-center'>Password</th>
                      </tr>";
        while ($row = mysqli_fetch_assoc($result)) {

            $_uid = $row['uid'];

            echo "<tr>
                       <td class='text-center'>" . $_POST['id'] . "</td>
                       <td class='text-center'>" . $row['fname'] . "</td>
                       <td class='text-center'>" . $row['lname'] . "</td>
                       <td class='text-center'>" . $row['uid'] . "</td>
                       <td class='text-center'>" . $row['pwd'] . "</td>
                      </tr>";
        }
        echo "</table>            
            </div>
           <div class='col-lg-2'></div>
          </div>
         </div>
        </div>
       </article>
       <br><br><br>";
    }
    echo "<article >
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
                        <h2 class='signupform'>User running records!!!</h2>";

    $sql = "SELECT * FROM user_data WHERE uid='".$_uid."' ORDER BY date DESC";
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
        echo "<h2 class='signupform'>There is no data in database!</h2>";
    }
    echo "<br><br>";
    echo "<a href='profile.php' class='btn btn-block btn-info' role='button'>Return to users!</a>";
    echo "<div class='col-lg-2'></div>
                    </div>
                </div>
            </div>
        </article>";


} elseif (isset($_POST['delete'])) {

    $sql = "DELETE FROM users WHERE id='".$_POST['id']."'";
    $result = mysqli_query($connection, $sql);

    header("Location: profile.php");
}
?>


</body>
</html>