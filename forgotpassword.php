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
    .err{
        color: red;
    }
    #main {
        background-color: lightblue;
    }
    </style>
    <title>Forgot Password</title>
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
                        <h2 class="fw-bold mb-5">Forgot Password</h2>
                        <form action="" method="post">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <?php               
            if($_SERVER['REQUEST_METHOD']=="POST"){
                include 'config.php';
                $email_name = mysqli_real_escape_string($conn,$_POST['email']);
                
                //checking if user name is taken
                $user_sql = "SELECT * from `details` where `email` = '{$email_name}'";
                $user_check = mysqli_query($conn,$user_sql);
                if(mysqli_num_rows($user_check)>0){
                  while($row = mysqli_fetch_assoc($user_check)){
                        session_start();
                        $_SESSION['uid'] = $row['id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['loggedin'] = true;
                        header("location: newpassword.php");
                         
                  }
                }else{
                  echo '<div class="alert alert-danger">Invalid E-mail Address</div>';
                }
              }
            
            ?>


                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control"
                                     name="email" placeholder="Example@gmail.com" />
                                <label class="form-label" for="form3Example3">Email address</label><span class="err">*</span>
                            </div>
                           

                            



                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Login
                            </button> 
                            <a href="login.php" type="submit" class="btn btn-primary btn-block mb-4">
                                Cancel
                            </a>
                           
                           

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