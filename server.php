<?php

session_start(); //server session starts Here


if(isset($_POST['submit']))
{
    ob_end_clean(); //clean outer buffer memory
    
    validate($_POST['user'],$_POST['pass'],$_POST['user_csrf'],$_COOKIE['user_login']);

}




//validate the form details
function validate($username, $password,$user_token,$user_sessionCookie)
{
    if($username=="admin" && $password=="admin")
    {
        if($user_token==$_COOKIE['cToken'] && $user_sessionCookie==session_id())
        {
            echo "<script> alert('Logged in Successfully') </script>";
            echo "<h1 style=\"font-size:50px;text-align:center;\">Welcome : ".$username."<br/></h1>";           
        }
        else
        {
           echo "<script> alert('Login failed! CSRFToken not matching!!') </script>"; 
                      
           echo "<script type=\"text/javascript\"> window.location.href = 'index.php'; </script>";
        }          
    }
    else{
        echo "<script> alert('Login failed! Check your username, password and login again!!') </script>"; 
           
        echo "<script type=\"text/javascript\"> window.location.href = 'index.php'; </script>";
    }    
}


?>