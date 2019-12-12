<?php
include 'connect.php';
session_start();
include 'AdminNavbar.php';
include 'admin_header.php'
?>

       
    <?php
         foreach ($_POST['select2'] as $selectedOption)
         $values[]=$selectedOption;
         
        
        $sql= "SELECT * FROM Posts where post_category in (".implode(',',$values).")";
        
         
        
       
        
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
                echo'<table class="table" width="200">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Post ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Handle</th>
                        </tr>
                    </thead>';
                while($row = mysqli_fetch_assoc($result))
                {
                    
                        echo'
                        <table class="table" width="200">
                        <tr>
                        <td scope="col">'.$row["post_id"].'</th>
                        <td scope="col">'.$row["post_title"].'</th>
                        <td scope="col">'.$row["post_description"].'</th>
                        <td scope="col"><a href="delete_posts.php?id='.$row["post_id"].'" class="btn btn-primary">Delete</a></th>
                        </tr>
                    
                    <tbody>
                    </table>
                    ';
                    
    
                }
             }
        }
    ?>
    
  </div>
</body>
</html>