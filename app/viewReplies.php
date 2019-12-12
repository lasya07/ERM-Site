<?php
include 'header.php';
include 'connect.php' ;
session_start();
$post_id=$_GET['id'];

if($_SESSION['signed_in'] == false)
      {
          //the user is not signed in
          echo 'Sorry, you have to be <a href="signin.php">signed in</a> to create a topic.';
      }
      else{
        $sql ="SELECT * FROM Posts WHERE post_id=$post_id";
        $sql2 ="SELECT
        reply.reply_content,
        reply.reply_date,
        user.user_name
    FROM
        reply
    LEFT JOIN
        user
    ON
        reply.reply_by = user.user_id
    WHERE
        reply.post_id = $post_id ";
        $result = mysqli_query($conn,$sql);
        $result2 = mysqli_query($conn,$sql2);
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
                   echo '<br/>
                   <div class="card w-75">
                   <div class="card-body">';
                     echo '<h5 class="card-title">'.$row["post_title"].'</h5>
                     <p class="card-text">'.$row["post_description"].'</p>
                    
                   </div>
                 </div>
                 <br/>';
               }
            }
       }
       if(!$result)
       {
           //the query failed, uh-oh :-(
           echo 'Error while selecting from database. Please try again later.';
       }
      else
      {
          echo '<h5> REPLIES</h5>
          <div class="row">';
                  
                  
          if(mysqli_num_rows($result2) == 0)
           {
             echo 'no rows';
           }
           else{
              while($row = mysqli_fetch_assoc($result2))
              {
                echo '
                <div class="col-sm-3">';
                echo '<div class="card">
                <div class="card-body">';
                    echo '
                    <h5 class="card-title">'.$row["reply_content"].'</h5>
                    <h10>User: '.$row["user_name"].'</h10>
                    <br>
                    <h10>Time:'.$row["reply_date"].'</h10>
                  </div>
                  </div>
                  </div>
               <br/>
                ';
              }
           }
           echo' 
           
           
           </div>';
      }
      }
      

?>