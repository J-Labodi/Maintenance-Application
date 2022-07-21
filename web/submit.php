<?php
session_start();
include "config.php";

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// retrieve the the latest ticket submission
$sql2 = mysqli_query($conn, "SELECT * FROM multistep ORDER BY ticketNo DESC LIMIT 0, 1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/submit.css"/>
</head>
<body>
    <a href="">
        <img src="images/uwelogo.jpg" alt="UWE logo">
    </a>
    <section>
        <div id="myDiv">
            <p>Your report has been submitted!<br>Thank You!</p>
            <p>Your ticket number is:</p>
            <div class="row">
                <div class="col-12 d-flex  justify-content-around align-items-center">
                    <table>
                        <tr>
                            <td>
                            <!-- fetching the ticketNo of the latest ticket submission -->
                            <?php
                            while($row = mysqli_fetch_array($sql2)) {
                            echo 'FR ' . $row['ticketNo']; 
                            }
                            ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>If you still like to contact with UWE ITS<br>You can get in touch by phone or email:</p>
            <p>+44(0)1173283612<br>itonline@uwe.ac.uk</p>
        </div>
    </section>
    <?php
    // close connection
    mysqli_close($conn);
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
