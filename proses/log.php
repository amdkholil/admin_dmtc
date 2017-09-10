<?php
require_once '../lib/config.php';

if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query=$mysqli->query("select * from user where username='$username' and password='$password'");
	if($query->num_rows > 0)
	{
		session_start();
		$data=$query->fetch_assoc();
		$_SESSION['username']=$username;
		$_SESSION['fullname']=$data['fullname'];
		$_SESSION['level']=$data['level'];
		header("Location: ../index.php");
	}
	else
	{
		session_start();
		$_SESSION['notif']="Login gagal, Silahkan coba lagi!!";
		echo "<script>history.go(-1);</script>";
	}
}

if(isset($_GET['act']) and $_GET['act']=="out")
{
	session_start();
	session_destroy();
	header("Location: ../index.php");
}

?>