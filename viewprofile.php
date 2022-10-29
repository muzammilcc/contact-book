<?php
include 'config.php';
$get_id = $_GET['id'];
$vp_sql = "SELECT * FROM `details` WHERE `id` = '{$get_id}'";
$vp_result = mysqli_query($conn,$vp_sql);
if(mysqli_num_rows($vp_result)>0){
    while($vp_row = mysqli_fetch_assoc($vp_result)){
        $vp_name = $vp_row['fname'];
        $vp_lname = $vp_row['lname'];
        $vp_email = $vp_row['email'];
        $vp_datetime = $vp_row['datetime'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />

    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Profile Page</title>
</head>

<body class="d-flex vw-100 align-items-center justify-content-center" style="height: 600px;">
    <?php 
  include 'navbar.php';
  ?>
    <div class="container border mt-5 p-5">
        <h1>Your Profile Info</h1>
        <hr class="border border border-2 opacity-75">
        <form action="">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Your Name</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $vp_name;?>" readonly  disabled class="form-control-plaintext" id="staticEmail">
                </div>
            </div>
            <hr class="border border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $vp_lname;?>" readonly disabled class="form-control-plaintext" id="staticEmail">
                </div>
            </div>
            <hr class="border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $vp_email;?>" readonly disabled class="form-control-plaintext" id="staticEmail">
                    <div id="emailHelp" class="form-text">Manage your info, privacy and security <a
                            href="editprofile.php?id=<?=$get_id;?>">Edit Here</a></div>
                </div>
            </div>
            <hr class="border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Last Updated on</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $vp_datetime;?>" readonly disabled class="form-control-plaintext" id="staticEmail">
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>
