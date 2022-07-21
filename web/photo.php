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
$prevheader = "comments.php?room=$roomfromURL&equipmentno=$equipmentnofromURL&item=$itemfromdb&brand=$brandfromdb";

if (isset($_SESSION['info'])) {

    // extract array so we can use its key as a variable name
    extract($_SESSION['info']);   
}

if (isset($_POST['submit'])) {

    foreach ($_POST as $key => $value) {
        $_SESSION['info'][$key] = $value;
    }

    $keys = array_keys($_SESSION['info']);

    if (in_array('submit', $keys)) {
        unset($_SESSION['info']['submit']);
    }

    // access image from server
    if(!empty($_FILES["image"]["name"])) { 
        // get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 
    }
    
    // insert values from query string + image to DB
    $insert = $conn->query("INSERT INTO multistep (username, roomno, equipno, item, brand, comments, photo, created) VALUES ('$username','$roomfromURL','$equipmentnofromURL','$itemfromdb','$brandfromdb','$comments','$imgContent', NOW())");

    header('Location: submit.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Photo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/photo.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
</head>
<body>
    <a href="index.php">
        <img src="images/uwelogo.jpg" alt="UWE logo - redirect to login page">
    </a>
    <section>
        <div id="myDiv">
        <h2>Photo Evidence</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="image-preview" id="imagePreview">
                    <div class="container">
                        <div id="preview">

                        </div>
                    </div>
                </div>     

                <p>Please submit a photo evidence (optional)</p>
                <div class="row m-3">
                    <div class="parent">
                        <div class="child">
                        <input type="file" accept="image/gif,image/jpeg,image/jpg,image/png" name="image" id="image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex  justify-content-around align-items-center">
                        <button type="button" class="btn btn-primary"><a href="<?php echo $prevheader;?>">Previous</a></button>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- utilizing image preview -->
    <script>
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                $('#preview').html('<img id="previmg" src="'+event.target.result+'"/>');
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }

    $("#image").change(function () {
        imagePreview(this);
    });
    </script>
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