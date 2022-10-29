<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'config.php';
    $d_id = $_POST['id'];
    $del_sql = "DELETE FROM `details` WHERE `id` = {$d_id};";
    $del_sql .= "DELETE from `contact` WHERE `uid` = '{$d_id}';";
    $del_result = mysqli_multi_query($conn,$del_sql);
    if($del_result){
        header("location: login.php");
    }else{
        header("location: deleteprofile.php?id=".$d_id);
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

    <title>Delete Page</title>
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
        <h1>Delete Profile</h1>
        <hr class="border border border-2 opacity-75">
        <form action="" method="POST">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Your Name</label>
                <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?= $vp_row['id'];?>">
                    <input type="text" value="<?= $vp_row['fname'];?>" readonly disabled class="form-control-plaintext"
                        id="staticEmail">
                </div>
            </div>
            <hr class="border border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $vp_row['lname'];?>" readonly disabled class="form-control-plaintext"
                        id="staticEmail">
                </div>
            </div>
            <hr class="border border-1 opacity-50">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $vp_row['email'];?>" readonly disabled class="form-control-plaintext"
                        id="staticEmail">
                </div>
            </div>
            <hr class="border border-1 opacity-50">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                Click Here to Delete Account
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Account</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            You're Account Will be Deleted Permenantly. Are You Sure Do You Want To Delete Your
                            Account???
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" name="button" class="btn btn-danger" value="Delete Account">
                        </div>
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