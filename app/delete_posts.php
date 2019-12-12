<?php
include 'connect.php';
$post_id=$_GET['id']; 
$sql="DELETE FROM Posts WHERE post_id=$post_id";
mysqli_query($conn,$sql);
    
              header('location: admin_center.php');

          
        ?>