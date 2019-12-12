<?php
session_start();
include 'connect.php';
include 'header.php';

// // echo '<h2>Create a topic</h2>';
// if($_SESSION['signed_in'] == false)
// {
//     //the user is not signed in
//     echo 'Sorry, you have to be <a href="signin.php">signed in</a> to create a post.';
// }
// else
// {
    
    
        $sql = "INSERT INTO Posts(post_title,post_description,post_category,post_date,post_by)VALUES(
            '" . mysqli_real_escape_string($conn,$_POST['post_title']) . "','" . mysqli_real_escape_string($conn,$_POST['post_description']) . "','" . mysqli_real_escape_string($conn,$_POST['post_category']) . "',NOW()," . $_SESSION['user_id'] . "
        ) ";
        $result = mysqli_query($conn,$sql);
        if(!$result)
          {
              //something went wrong, display the error
              echo 'Error' . mysqli_error($conn);
          }
          else
          {
              echo 'New Posts Created;';
          }
    


// }
?>