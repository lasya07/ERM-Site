<?php
session_start();
include 'connect.php';
include 'header.php';
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
      if($_SESSION['signed_in'] == false)
      {
          //the user is not signed in
          echo 'Sorry, you have to be <a href="signin.php">signed in</a> to create a topic.';
      }
      else{
        if($_SERVER['REQUEST_METHOD'] != 'POST')
              {   
                  //the form hasn't been posted yet, display it
                  //retrieve the categories from the database for use in the dropdown
                  $sql = "SELECT
                              cat_id,
                              cat_name,
                              cat_description
                          FROM
                              categories";
                  
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
                        echo '
                        <form  method="post" action="create_post.php" id="publishPost">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Heading</label>
                          <input class="form-control form-control-lg" type="text" placeholder="Enter the title" name="post_title">
                        </div>
                    
                      
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Description</label>
                          <textarea name="post_description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">select category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="post_category">
                        ';
                        while($row = mysqli_fetch_assoc($result))
                                  {
                                    echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                                  }
                          
                      echo ' </select>
                      </div>
                      
                    <button class="btn btn-lg pull-xs-right btn-primary" type="submit"> Publish Post </button>   
              </form>  
                        ';
                                }
                      }
                    }
      }
      
  ?>

</body>
</html>
    

