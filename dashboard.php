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
    <link rel="stylesheet" href="extensions/sticky-header/bootstrap-table-sticky-header.css">
    <title>Dashboard</title>
</head>

<body class="d-flex vw-100 vh-50 align-items-center justify-content-center" style="height: 600px;">
    <?php include 'navbar.php';?>
    <div class="container border" style="width: 200% ;">
        <h1>Your Contacts</h1>
        <hr class="border border border-2 opacity-75">
        <table class="table table-striped table-hover " style="position: relative;">
            <thead>
                <tr>
                    <th scope="col">Sr.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Number</th>
                    <th scope="col">Company</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <?php 
            $alert = false;
            $x = 0;
            $limit = 3;
            $count = $x+1;
            if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                include 'config.php';
                $offset = ($page -1) * $limit;
                // SELECT * FROM `contact` WHERE `uid` = 1 LIMIT 0,3;
                $contact_sql = "SELECT * FROM `contact` WHERE `uid` = '{$_SESSION['id']}' LIMIT $offset,$limit";
                $contact_result = mysqli_query($conn,$contact_sql);
                if(mysqli_num_rows($contact_result)>0){
                    while($contact_row = mysqli_fetch_assoc($contact_result)){
                    
            ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $count; ?></th>
                    <td><?= $contact_row['cname'];?> &nbsp;<?= $contact_row['clname'];?></td>
                    <td><?= $contact_row['email'];?></td>
                    <td><?= $contact_row['number'];?></td>
                    <td><?= $contact_row['company'];?></td>
                    <td><a href="viewcontact.php?cid=<?=$contact_row['cid'];?>" class="btn-sm btn-primary"
                            type="submit">View </a></td>
                </tr>
            </tbody>
            <?php 
            $count++;//for serial number   
              }
            }else{
                $alert = '<div class="alert alert-danger">No Result Found <a href="addcontact.php">Add New Contact</a></div>';
            }
            
            ?>
        </table>
        <?php echo $alert; ?>
        <!-- pagination here -->
        <div class="container" style="width:25% ;">
        <nav aria-label="Page navigation example">
            <?php 
            $page_sql = "SELECT * FROM `contact` WHERE `uid` = '{$_SESSION['id']}'";
            $page_result = mysqli_query($conn,$page_sql);
            $total_records = mysqli_num_rows($page_result);
            $total_pages = ceil($total_records / $limit);
            echo '<ul class="pagination">';
            if($page > 1){
                echo '<li class="page-item">
                <a class="page-link" href="dashboard.php?page='.($page - 1).'" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>';
            }
            for($i=1;$i<=$total_pages;$i++){
                if($i == $page){
                    $active = "active";
                }else{
                    $active = '';
                }
                echo '<li class="page-item '.$active.'"><a class="page-link" href="dashboard.php?page='.$i.'">'.$i.'</a></li>';
            }
            if($total_pages > $page){
                echo ' <li class="page-item">
                <a class="page-link" href="dashboard.php?page='.($page + 1).'" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>';
            }
            echo '</ul>';
            
            ?>
            
                <!-- 
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                -->
            
        </nav>
    </div>
        <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js">
    </script>
    <script src="extensions/sticky-header/bootstrap-table-sticky-header.js"></script>


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