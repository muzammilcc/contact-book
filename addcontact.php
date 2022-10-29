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
    <title>Hello, world!</title>
</head>

<body class="d-flex vw-100 vh-50 align-items-center justify-content-center" style="height: 600px;">
    <?php 
include 'navbar.php';
?>
<?php 
$alert = false;
$error = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'config.php';
    $c_name = mysqli_real_escape_string($conn,$_POST['cname']);
    $c_lname = mysqli_real_escape_string($conn,$_POST['clname']);
    $c_email = mysqli_real_escape_string($conn,$_POST['cemail']);
    $c_number = mysqli_real_escape_string($conn,$_POST['number']);
    $c_company = mysqli_real_escape_string($conn,$_POST['company']);
    $user_id = $_SESSION['id'];
    if(strlen($c_number)!=10){
        $error = "<div class='alert alert-danger'>Number is Invalid</div>";
    }else{
        $c_sql = "INSERT INTO `contact` (`cname`, `clname`, `email`, `company`, `number`, `uid`) VALUES ('$c_name', '$c_lname', '$c_email', '$c_company', '$c_number', '$user_id');";
        $c_result = mysqli_query($conn,$c_sql);
        if($c_result){
           $alert = "<div class='alert alert-success'>Contact Added Successfully <a href='dashboard.php?id=".$user_id."'>View Contact</a></div>";
        }else{
            $error = "<div class='alert alert-danger'>Something Went Wrong</div>";
        }
    }
}
?>  
    <div class="container border p-5">
        <?= $alert;?>
        <?= $error;?>
        <h1>Add Contact</h1>
        <form class="row g-3" action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">First name</label>
                <input type="text" class="form-control" id="validationDefault01"  required name="cname" placeholder="First Name">
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationDefault02"  name="clname" placeholder="Surname">
            </div>
            <div class="col-md-4">
                <label for="validationDefaultUsername" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    <input type="text" class="form-control" id="validationDefaultUsername" name="cemail" placeholder="Example@gmail.com"
                        aria-describedby="inputGroupPrepend2" >
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationDefault03" class="form-label">Mobile Number</label>
                <input type="number" class="form-control" id="validationDefault03" required name="number" placeholder="Phone Number">
            </div>
            <div class="col-md-6">
                <label for="validationDefault05" class="form-label">Company</label>
                <input type="text" class="form-control" id="validationDefault05" name="company" placeholder="Enter Company or Job Title">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- https://cdnjs.com/libraries/popper.js/2.5.4 -->
    <!-- <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js"
    ></script> -->

    <!-- More: https://getbootstrap.com/docs/5.0/getting-started/introduction/ -->
</body>

</html>