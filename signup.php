<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    #main {
        background-color: lightblue;
    }

    .err {
        color: red;
    }
    </style>
    <title>Sign up</title>
</head>

<body id="main">
    <!-- Section: Design Block -->
    <section class="container py-5">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
        background-image: url('background.jpg');
        height: 300px;
        "></div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Sign up now</h2>
                        <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <?php 
                            $user_name = $last_name = $email_name = $password = $c_password = "";
                            if($_SERVER['REQUEST_METHOD']=="POST"){
                            include 'config.php';
                            if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['psw']) || empty($_POST['cpsw'])){
                            echo "<div class='alert alert-danger'>Empty Fields</div>";
                            }else{
                            $user_name = mysqli_real_escape_string($conn,$_POST['fname']);
                            $last_name = mysqli_real_escape_string($conn,$_POST['lname']);
                            $email_name = mysqli_real_escape_string($conn,$_POST['email']);
                            $password = mysqli_real_escape_string($conn,$_POST['psw']);
                            $c_password = mysqli_real_escape_string($conn,$_POST['cpsw']);


                            //checking if user name is taken
                            $user_sql = "SELECT email from details where email = '{$email_name}'";
                            $user_check = mysqli_query($conn,$user_sql);
                            if(mysqli_num_rows($user_check)>0){
                            echo "<div class='alert alert-danger'>Username Taken</div>";
                            }else{
                            //checking if password match or not
                            if($password == $c_password){
                                if(isset($_POST['psw'])){
                                    // Validate password strength
                                    $uppercase    = preg_match('@[A-Z]@', $password);
                                    $lowercase    = preg_match('@[a-z]@', $password);
                                    $number       = preg_match('@[0-9]@', $password);                                    
                                    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                                        echo '<div class="alert alert-danger">Password is not Strong</div>';
                                        
                                    } else {
                                        $hash_pass = password_hash($password,PASSWORD_DEFAULT);
                                        $pass_sql = "INSERT INTO `details` (`fname`,`lname`,`email`,`password`) values ('$user_name','$last_name','$email_name','$hash_pass')";
                                        $result_sql = mysqli_query($conn,$pass_sql);
                                        if($result_sql){  
                                        $alert =  "<div class='alert alert-success'>Accout Created Now You Can Login</div>";    
                                        header("location: login.php");
                                        }else{
                                        echo '<div class="alert alert-danger">Something Went Wrong</div>';
                                        }
                                    } 
                                }
                            
                            }else{
                                echo '<div class="alert alert-danger">Password Do Not Match</div>';
                            }
                            }
                            }
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example1" class="form-control" name="fname" value="<?php echo $user_name; ?>"  placeholder="First Name"/>
                                        <label class="form-label" for="form3Example1" >First name</label><span
                                            class="err">*</span>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example2" class="form-control" name="lname"  value="<?php echo $last_name; ?>" placeholder="Last Name"/>
                                        <label class="form-label" for="form3Example2">Last name</label><span
                                            class="err">*</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control" name="email"  value="<?php echo $email_name; ?>" placeholder="example@gmail.com "/>
                                <label class="form-label" for="form3Example3">Email address</label><span
                                    class="err">*</span>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" class="form-control" name="psw"  value="<?php echo $password; ?>" placeholder="Password"/>
                                <label class="form-label" for="form3Example4"><small>Use 8 or more characters with a mix of letters & numbers</small></label><span class="err">*</span>
                            </div>

                            <!-- confirm password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" class="form-control" name="cpsw"  value="<?php echo $c_password; ?>" placeholder="Repeat Password"/>
                                <label class="form-label" for="form3Example4">Confirm Password</label><span
                                    class="err">*</span>
                            </div>



                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Sign up
                            </button>
                            If Already a User??<a href="login.php">Login here</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>