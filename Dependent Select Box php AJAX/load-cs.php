<?php

	$conn = mysqli_connect("localhost","root","","ajax_database") or die("Connection failed");
$option = "";
	if ($_POST['type'] == "") {
		$sql = "SELECT * FROM country_tb";
		$query = mysqli_query($conn, $sql) or die('couldn\'t connect to database');
		while ($row = mysqli_fetch_assoc($query)){
			$option .="<option value='{$row['cid']}'>{$row['cname']}</option>";
		}
	}
	elseif($_POST['type'] == "stateData"){
		$sql = "select * from state_tb where country ={$_POST['dataName']}";
		$query = mysqli_query($conn,$sql) or die('couldn\'t connect to database ');
		while($row = mysqli_fetch_assoc($query)){
			$option .= "<option value='{$row['sid']}'>{$row['sname']}</option>";
		}
	}
	echo $option;
?>
