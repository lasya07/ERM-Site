<?php
include 'connect.php';
session_start();
include 'header.php';
include 'sidebar.php'
?>

       
    <?php
        
        $sql= "SELECT post_id,post_title,post_description,post_date,post_by FROM Posts";
        
        $result = mysqli_query($conn,$sql);
         
         if(!$result)
         {
             //the query failed, uh-oh :-(
             echo 'Error while selecting from database. Please try again later.';
         }
        else
        {
            if(mysqli_num_rows($result) == 0)
             {
               echo 'no rows';
             }
             else{
                while($row = mysqli_fetch_assoc($result))
                {
                  $pid= $row["post_id"];
                  echo '<div class="card w-75">
                    <div class="card-body">';
                      echo '<h5 class="card-title">'.$row["post_title"].'</h5>
                      <p class="card-text">'.$row["post_description"].'</p>
                      <a href="reply_form.php?id='.$row["post_id"].'" class="btn btn-primary">Reply</a>
                      <a href="viewReplies.php?id='.$row["post_id"].'" ">View Replies</a>
                    </div>
                  </div>
                  <br/>';
                }
             }
        }
    ?>
    
  </div>
</body>
</html>