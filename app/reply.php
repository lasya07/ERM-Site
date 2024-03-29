<?php

include 'connect.php';
include 'header.php';
 
// if($_SERVER['REQUEST_METHOD'] != 'POST')
// {
//     echo 'This file cannot be called directly.';
// }
// else
// {
    //check for sign in status
    if(!$_SESSION['signed_in'])
    {
        echo 'You must be signed in to post a reply.';
    }
    else
    {
        //a real user posted a real reply
        $sql = "INSERT INTO 
                    reply(reply_content,
                          reply_date,
                          post_id,
                          reply_by) 
                VALUES ('" . $_POST['reply-content'] . "',
                        NOW(),
                        " . mysqli_real_escape_string($conn,$_GET['id']) . ",
                        " . $_SESSION['user_id'] . ")";
                         
        $result = mysqli_query($conn,$sql);
                         
        if(!$result)
        {
            echo 'Error' . mysqli_error($conn);
            
            echo 'Your reply has not been saved, please try again later.';
        }
        else
        {
            echo 'Your reply has been saved, check out <a href="viewReplies.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
        }
    }
// }
?>