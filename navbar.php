<?php 
session_start();
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true){
    header("location: logout.php");
}   
?>
<?php
include 'config.php';
$get_id = $_SESSION['id'];
$sql = "SELECT * FROM `details` WHERE `id` = '{$get_id}'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $username = $row['fname'];
        $e_mail = $row['email'];
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
    <link rel="stylesheet" href="navbar.css">

    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <title></title>
</head>
<?php 
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
?>
<body>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="viewprofile.php?id=<?=$id;?>" class="list-group-item list-group-item-action py-2 ripple"
                        aria-current="true">
                        <i class="fas fa-eye fa-fw me-3"></i><span>View Profile</span>
                    </a>
                    <a href="editprofile.php?id=<?=$id;?>" class="list-group-item list-group-item-action py-2 ripple"
                        aria-current="true">    
                        <i class="fas fa-user fa-fw me-3"></i><span>Edit Profile</span>
                    </a>
                    <a href="deleteprofile.php?id=<?=$id;?>" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-trash fa-fw me-3"></i><span>Delete Profile</span>
                    </a>
                    <a href="forgotpassword.php?id=<?=$id;?>" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fas fa-lock fa-fw me-3"></i><span>Forgot Password</span></a>
                    <a href="#" class="list-group-item list-group-item-action py-2 "><i
                            class="fas  fa-fw me-3"></i><span></span></a>
                    <a href="addcontact.php?id=<?=$id;?>" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fas
          fa-plus fa-fw me-3"></i><span>Add Contact</span></a>
                    <a href="editcontact.php?id=<?=$id;?>" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-phone fa-fw me-3"></i><span>Edit Contact</span>
                    </a>
                    <a href="dashboard.php?page=<?=$page;?>" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fas fa-eye fa-fw me-3"></i><span>View Contact</span></a>
                    <a href="logout.php" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fas fa-sign-out-alt fa-fw me-3"></i><span>Logout</span></a>

                </div>
            </div>
        </nav>
        <!-- Sidebar -->
        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- navbartop start -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active"
                                            href="dashboard.php?page=<?=$page;?>"><img src="contacts.png" alt="no images" style="width:35px;height:35px;"></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="dashboard.php?page=<?=$page;?>"><h4 class="gb_4d gb_1c">Contacts</h4></a>
                                    </li>
                                    
                                </ul>
                                <form class="d-flex">
                                    <input value="<?= substr($e_mail,0,15)."......";?>" class="form-control me-2"  disabled
                                        aria-label="Search">
                                    <a href="logout.php" class="btn btn-outline-success" type="submit">Logout</a>
                                </form>
                            </div>
                        </div>
                    </nav>
                    <!-- navbar top ends -->
                </button>

        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4"></div>
    </main>
    <!--Main layout-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>