<?php 
  include 'config.php';
  if($_SERVER['REQUEST_METHOD']=="POST"){
    $up_id = mysqli_real_escape_string($conn,$_POST['id']);
    $up_name = mysqli_real_escape_string($conn,$_POST['fname']);
    $up_lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $up_email = mysqli_real_escape_string($conn,$_POST['email']);
    $up_sql = "UPDATE `details` SET `fname` = '$up_name', `lname` = '$up_lname ', `email` = '$up_email' WHERE `details`.`id` = '{$up_id}';";
    $up_result = mysqli_query($conn,$up_sql);
    if($up_result){
        header("location: viewprofile.php?id=".$up_id);
    }else{
        echo '<div class="alert alert-danger">Something Went Wrong</div>';
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

    <title>Update Page</title>
</head>

<body class="d-flex vw-100 align-items-center justify-content-center" style="height: 600px;">
    <?php 
  include 'navbar.php';
  ?>
    <?php
include 'config.php';
$get_id = $_GET['id'];
$vp_sql = "SELECT * FROM `details` WHERE `id` = '{$get_id}'";
$vp_result = mysqli_query($conn,$vp_sql);
if(mysqli_num_rows($vp_result)>0){
    while($vp_row = mysqli_fetch_assoc($vp_result)){
?>
    <div class="container border mt-5 p-5">
        <h1>Update Your Profile Info</h1>
        <hr class="border border border-2 opacity-75">
        <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $vp_row['id']; ?>">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Your Name</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $vp_row['fname']; ?>" class="form-control-plaintext"
                        id="staticEmail" name="fname">
                </div>
            </div>
            <hr class="border border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $vp_row['lname']; ?>" class="form-control-plaintext"
                        id="staticEmail" name="lname">
                </div>
            </div>
            <hr class="border border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $vp_row['email']; ?>" class="form-control-plaintext"
                                  id="staticEmail" name="email">
                </div>
            </div>
            <div class="col-sm-8">
                <input type="submit" name="button" class="btn btn-outline-primary" value="Update Profile">

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