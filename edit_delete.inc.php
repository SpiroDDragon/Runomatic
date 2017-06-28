<?php

include 'header.php';

if (isset($_POST['edit'])) {
    echo "<section class='main-container'>
            <article class='main-container'>
               <div class='container'>
                  <div class='row'>
                     <div class='col-lg-2'></div>
                     <div class='col-lg-8'>
                       <h2 class='signupform'>Record you wish to edit!!!</h2>";

    $sql = "SELECT * FROM user_data WHERE data_id='".$_POST['data_id']."'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive'>
                                    <table class='table-bordered'>
                                         <tr>
                                             <th class='col-md-2 text-center'>Date:</th>
                                             <th class='col-md-2 text-center'>Distance in meters:</th>
                                             <th class='col-md-2 text-center'>Time:</th>
                                         </tr>";
        while ($row = mysqli_fetch_assoc($result)) {

            $time = $row['hrs'] * 3600 + $row['min'] * 60 + $row['sec'];
            $speed = $row['dis'] / $time * 3600 / 1000;
            $date = date("d-m-Y", strtotime($row['date']));

            echo "<tr>
                                        <td hidden><input class='form-control' type='number' name='data_id' value='".$_POST['data_id']."'></td>
                                        <td class='text-center'>" . $date . "</td>
                                        <td class='text-center'>" . $row['dis'] . " meters</td>
                                        <td class='text-center'>" . $row['hrs'] . ":" . $row['min'] . ":" . $row['sec'] . "</td>
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
                    <h2 class="signupform">Please edit Date, Distance and Time!</h2>
                    <form action="includes/edit_data.inc.php" method="POST">
                        <div class="table-responsive">
                            <table class="table-bordered">
                                <tr>
                                    <th class="col-md-2 text-center">Date:</th>
                                    <th class="col-md-2 text-center">Distance in meters:</th>
                                    <th class="col-md-2 text-center">Hours:</th>
                                    <th class="col-md-2 text-center">Minutes:</th>
                                    <th class="col-md-2 text-center">Seconds:</th>
                                </tr>
                                <tr>
                                    <td hidden><input class="form-control" type="number" name="data_id" value="'.$_POST['data_id'].'" ></td>
                                    <td><input class="form-control" type="date" name="date"></td>
                                    <td><input class="form-control" type="number" name="dis"></td>
                                    <td><input class="form-control" type="number" name="hrs"></td>
                                    <td><input class="form-control" type="number" name="min"></td>
                                    <td><input class="form-control" type="number" name="sec"></td>
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

} elseif (isset($_POST['delete'])) {

    $sql = "DELETE FROM user_data WHERE data_id='".$_POST['data_id']."'";
    $result = mysqli_query($connection, $sql);

    header("Location: profile.php");
}
?>


</body>
</html>