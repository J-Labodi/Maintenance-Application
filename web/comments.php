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
$itemfromdb = $_GET['item'];
$brandfromdb = $_GET['brand'];

// store previous header in case redirecting to previous page
$prevheader = "checklist.php?room=$roomfromURL&equipmentno=$equipmentnofromURL";

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
    header('Location: photo.php?room=' . $roomfromURL . '&equipmentno=' . $equipmentnofromURL . '&item=' . $itemfromdb . '&brand=' . $brandfromdb);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/comments.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <a href="index.php">
        <img src="images/uwelogo.jpg" alt="UWE logo - redirect to login page">
    </a>
    <section>
    <div id="myDiv">
        <form action="" method="post">
            <h2>Additional Information</h2>
            <textarea required name="comments" id="comments" cols="38" rows="12"></textarea>
            <div id="counter">
                <span id='remainingC'>
                    <!-- utilizing ch counter -->
                    <script>
                    $('textarea').keypress(function(){

                        if(this.value.length > 299){
                            return false;
                        }
                        $("#remainingC").html(299 - this.value.length);
                    });
                    </script>
                </span>
            </div>
            <p>Please describe the technical issue</p>
            <div class="row mt-5">
                <div class="col-12 d-flex  justify-content-around align-items-center">
                    <button type="button" class="btn btn-primary"><a href="<?php echo $prevheader;?>">Previous</a></a></button>
                    <button type="submit" class="btn btn-primary" name="next" value="next">Next</a></button>
                </div>
            </div>
        </form>
        <?php
        // close connection
        mysqli_close($conn);
        ?>
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