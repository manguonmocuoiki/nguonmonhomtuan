<?php 
	@session_start();
	include_once("ketnoi.php");
	if(count($_POST) > 0){
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = mysql_query("insert into customer(username, password, fullname) values ('{$username}', '{$password}', '".$fullname."')");
		if($query){
			$id = 0;
			$query = mysql_query("select id from customer where username = '{$username}'");
			$row = mysql_fetch_array($query);
			$id = $row['id'];
			$_SESSION['customer'] = $id;
		}
		header("Location: products-grid.php");
	}
?>