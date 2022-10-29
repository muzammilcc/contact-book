<?php 
include 'config.php';
$c_id = $_GET['cid'];
$u_id = $_GET['id'];
$delete_contact = "DELETE FROM contact WHERE `contact`.`cid` = '{$c_id}'";
$delete_result = mysqli_query($conn,$delete_contact);
if($delete_result){
    header("location: editcontact.php?id=".$u_id);
}
?>