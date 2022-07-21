<?php
// start session
session_start();
include "config.php";

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// GET values from query string
$roomfromURL = $_GET['room'];
$equipmentnofromURL = $_GET['equipmentno'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/checklist.css"/>
</head>
<body>
    <dic class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="index.php">
                    <img src="images/uwelogo.jpg" alt="UWE logo - redirect to login page">
                </a>
            </div>
        </div>
        <section>
        <div id="myDiv">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h2>Checklist</h2>
                </div>
            </div>
            <form action="" method="post">
                <div class="row pt-2 m-2">
                    <div class="col-12 d-flex justify-content-center">
                        <?php
                        // fetching item details from DB
                        $sql = "SELECT * FROM item";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<table id='table1'>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<th>Item</th>";
                                        $itemfromdb = $row['itemname'];
                                        echo "<td>" . $row['itemname'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<th>Brand</th>";
                                        $brandfromdb = $row['brand'];
                                        echo "<td>" . $row['brand'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<th>Room</th>";
                                        echo "<td>" . $row['room'] . "</td>";
                                    echo "</tr>";                                                
                                }
                                echo "</table>";
                                mysqli_free_result($result);
                            } else{
                                echo "No records matching your query were found.";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                        ?>
                    </div>
                </div>   
                <div class="row pt-3 m-3">
                    <div class="col-12 d-flex justify-content-center">
                        <?php
                        // fetching checklist questions from DB
                        $sql = "SELECT * FROM questions";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<table id='table2'>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['data'] . "</td>";
                                        echo '<td><input type="checkbox" required id="details-correct" name="check-a"></td>';
                                    echo "</tr>";
                                }
                                echo "</table>";
                                mysqli_free_result($result);
                            } else{
                                echo "No records matching your query were found.";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }

                        // close connection
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 d-flex justify-content-center">
                        <p>Please check all boxes before moving on</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex  justify-content-around align-items-center">
                        <button type="button" class="btn btn-primary"><a href="index.php">Previous</a></a></button>
                        <button type="submit" class="btn btn-primary" name="next" value="next">Next</button>
                    </div>
                </div>
            </form>
        </div>
        </section>
    </div>
    <?php
    if (isset($_POST['next'])) {
        // creating a new session variable put inside the key and value from POST array
        foreach ($_POST as $key => $value) {
            $_SESSION['info'][$key] = $value;
        }

        $keys = array_keys($_SESSION['info']);

        if (in_array('next', $keys)) {
            unset($_SESSION['info']['next']);
        }

        // redirect to next page
        header('Location: comments.php?room=' . $roomfromURL . '&equipmentno=' . $equipmentnofromURL . '&item=' . $itemfromdb . '&brand=' . $brandfromdb);
    }
    ?>
    <!-- utilizing Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>

</html>