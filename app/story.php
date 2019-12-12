<?php
include 'connect.php';
session_start();
include 'header.php';

?>

       
    <?php
        
        $sql= "SELECT article_title,article_description,article_content,article_by,article_date FROM articles";
        
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
                    echo '
                    <div class="card">
                    <div class="card-header">'.$row["article_by"].'
                    
                    </div>
                    <div class="card-body">';
                        echo '<h5 class="card-title">'.$row["article_title"].'</h5>
                        <p class="card-text">'.$row["article_description"].'</p>
                        <a href="#" class="btn btn-primary">Read</a>
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