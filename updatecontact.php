<?php 
$success = false;
$error = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'config.php';
    $up_cid = mysqli_real_escape_string($conn,$_POST['cid']);
    $up_cname = mysqli_real_escape_string($conn,$_POST['cname']);
    $up_clname = mysqli_real_escape_string($conn,$_POST['clname']);
    $up_email = mysqli_real_escape_string($conn,$_POST['email']);
    $up_number = mysqli_real_escape_string($conn,$_POST['number']);
    $up_company = mysqli_real_escape_string($conn,$_POST['company']);

    $update_sql = "UPDATE `contact` SET `cname` = '$up_cname', `clname` = '$up_clname', `email` = '$up_email', `company` = '$up_company', `number` = '$up_number' WHERE `contact`.`cid` = '{$up_cid}';
    ";
    $update_result = mysqli_query($conn,$update_sql);
    if($update_result){
        header("location: updatecontact.php?cid=".$up_cid);
    }else{
        $error = '<div class="alert alert-danger">Error While Updating</div>';
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
    <style>
    .header img {
        float: left;
        width: 90px;
        height: 90px;
    }

    .header h1 {
        position: relative;
        top: 18px;
        left: 10px;
    }
    </style>
    <title>Profile Page</title>
</head>

<body class="d-flex vw-100 align-items-center justify-content-center" style="height: 850px; position:relative;">
    <?php 
  include 'navbar.php';
  ?>
  <?php
include 'config.php';
$get_id = $_GET['cid'];
$vp_sql = "SELECT * FROM `contact` WHERE `cid` = '{$get_id}'";
$vp_result = mysqli_query($conn,$vp_sql);
if(mysqli_num_rows($vp_result)>0){
    while($vp_row = mysqli_fetch_assoc($vp_result)){
    
?>
    <div class="container border mt-5 p-5">
        <?php 
        if($success){
            echo $success;
        }
        if($error){
            echo $error;
        }
        ?>
        <div class="header">
            <img src="contacts.png" alt="no image">
            <h1><?= $vp_row['cname'];?>&nbsp;<?=$vp_row['clname'];?></h1>
        </div>
        <br>
        <br>
        <hr class="border border border-2 opacity-75">
        <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fa fa-user-circle" aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <input type="hidden" name="cid" value="<?= $vp_row['cid'];?>">
                    <input type="text" value="<?= $vp_row['cname'];?>" class="form-control-plaintext"
                        placeholder="Name" id="staticEmail" name="cname" required>
                </div>
            </div>
            <hr class="border border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fa fa-user" aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $vp_row['clname'];?>" class="form-control-plaintext"
                        placeholder="Last Name" id="staticEmail" name="clname">
                </div>
            </div>
            <hr class="border border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fa fa-envelope"
                        aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $vp_row['email'];?>" class="form-control-plaintext"
                        placeholder="E-mail" id="staticEmail" name="email">
                </div>
            </div>
            <hr class="border border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fa fa-phone"
                        aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $vp_row['number'];?>" class="form-control-plaintext"
                        id="staticEmail" name="number" placeholder="Mobile Number" required>
                </div>
            </div>
            <hr class="border border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fa fa-building"
                        aria-hidden="true"></i></label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $vp_row['company'];?>" placeholder='Company Name'
                        class="form-control-plaintext" id="staticEmail" name="company">
                </div>
            </div>
            <hr class="border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Last Updated on</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $vp_row['datetime'];?>" disabled class="form-control-plaintext"
                        id="staticEmail">
                </div>
            </div>
            <hr class="border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Edit Contact</label>
                <div class="col-sm-10">
                    <div id="emailHelp" class="form-text">
                        <button class="btn btn-primary" name="button" type="submit">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php 
    }
}   
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>