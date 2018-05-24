<?php 
     session_start();

     //setting a cookie
     $sessionID = session_id(); //storing session id
 
     setcookie("user_login",$sessionID,time()+3600,"/","localhost",false,true);//cookie-sessionid terminates after 1 hour - HTTP only flag
     
    $_SESSION['key']=bin2hex(random_bytes(32)); 
    $token = hash_hmac('sha256',"token for user login",$_SESSION['key']);  
    $_SESSION['CSRF_TOKEN'] = $token;

    setcookie("cToken",$token,time()+3600,"/","localhost",false,true);//cookie-token terminates after 1 hour

?>

<!DOCTYPE html>
<html>

<head>
    <title>Secure Software Systems - Assignment 2</title>		
<link rel="stylesheet" type="text/css" href="style1.css">
<script type="text/javascript" src="conf.js"> </script>
</head>



<body>
	
	<div class="wrap">


<h1 style="font-size: 35px;text-align:center;color: #dff9fb;text">CSRF Protection Via Double Submit Cookie</h1>
       
    <hr>

	<h1>Login</h1>
    <form class="login" method="POST" action="server.php">
    	<input type="text" name="user" placeholder="Username" required="required" />
		<input type="password" name="pass" placeholder="Password" required="required" />
		<input type="hidden" name="user_csrf" id="IdOfToken" value="<?php echo $token?>"/> 
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Login.</button>
    </form>

    <p style="font-size: 35px; text-align:center;color: #95afc0">For source Code: <a style="font-size: 35px; text-align:center;color: #dbd523" href="https://github.com/brayanbenett/CSRF-Protection-via-Asynchronous-Tokens-Double-submit-cookie-">Brayan Benett's GIT</a></p>
	<p style="font-size: 35px; text-align:center;color: #95afc0">For more Info: <a style="font-size: 35px; text-align:center;color: #dbd523" href="https://lonewolf28.wordpress.com/2018/05/15/cross-site-request-forgery-protection-via-double-submit-cookie/">Lonely Wolf 28</a></p>
</div>

</body>
</html>  