<?php

session_start();

include("Main Admin PDD/paper-dashboard-master/examples/db_config.php");

$_SESSION['error'] = '';

if($_SERVER['REQUEST_METHOD']== "POST")
{
	//something was posted
	$username1= $_POST['username'];
	$password= $_POST['password'];


	if(($username1)&&!empty($password))
{
	//read from the database
	$query="select * from users where username = '$username1' limit 1";

	$result = mysqli_query($conn,$query);

    if($result && mysqli_num_rows($result) > 0)
    {
        $user_data =mysqli_fetch_assoc($result);
        
        if($user_data['password']===$password)
        {
            $_SESSION['id1'] = $user_data['id'];
            header("Location: index1.php");
            die;
        }else{
            
            $_SESSION['error'] = "The passwprd is wrong";
            header("Location: Login.php");
          
        }
    }else
    {
        $_SESSION['error'] = "The user is not exist";
        header("Location: Login.php");
    }

}

}


?>