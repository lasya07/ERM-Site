<?php
include "connect.php"
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
            else
            {
                echo '
                <div class="container" style="margin-top:30px">
                <div class="row">
                  <div class="col-sm-4">
                    <form method="post" action="filtered_post.php">
                   
    
                    
                  <div class="form-group">
                      <label for="exampleFormControlSelect2">Select Category</label>
                      <select name="select2[]" multiple class="form-control" id="exampleFormControlSelect2">
                ';
                while($row = mysqli_fetch_assoc($result))
                                  {
                                    echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                                  }
                echo '
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                  <hr class="d-sm-none">
                </div>
                <div class="col-sm-8">       
                ';
            }
        }
?>

        
        