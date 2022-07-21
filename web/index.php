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

if (isset($_POST['next'])) {
    // clearing a new session variable put inside the key and value from POST array
    foreach ($_POST as $key => $value) {
        $_SESSION['info'][$key] = $value;
    }

    $keys = array_keys($_SESSION['info']);

    if (in_array('next', $keys)) {
        unset($_SESSION['info']['next']);
    };

    // redirect to next page
    header('Location: checklist.php?room=' . $roomfromURL . '&equipmentno=' . $equipmentnofromURL);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/index.css"/>
</head>

<body>
    <a href="index.php">
        <img src="images/uwelogo.jpg" alt="UWE logo - redirect to login page">
    </a>
    <section>
        <div id="myDiv">
            <h2>Report Issue</h2>
            <form method="POST">
                <div class="step step-1 active">
                    <div class="form-group">
                        <label for="Username">UWE Username:</label>
                        <br>
                        <input type="text" required id="username" name="username">
                    </div>

                    <div class="form-group">
                        <label for="roomno">Room No.:</label>
                        <br>
                        <input disabled type="text" id="roomno" name="roomno" value="<?php echo $roomfromURL; ?>">
                    </div>

                    <div class="form-group">
                        <label for="equipno">Equipment No.:</label>
                        <br>
                        <input disabled type="number" id="equipno" name="equipno" value="<?php echo $equipmentnofromURL; ?>">
                        <div class="row mt-5">
                            <div class="col-12 d-flex  justify-content-around align-items-center">
                                <button type="submit" class="btn btn-primary" name="next" value="next">Next</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </section>
    <!-- utilizing Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>

</html>