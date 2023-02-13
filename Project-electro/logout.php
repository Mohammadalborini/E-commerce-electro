<?php
session_start();

if(isset($_SESSION['id1']))
{
    unset($_SESSION['id1']);
}

header("Location: Login.php");
die;