<?php

include("server.php");

if(isset($_POST["A_register_User"])){
	$username = mysqli_real_escape_string($conn, $_POST["A_register_User"]);
	$password = mysqli_real_escape_string($conn, $_POST["A_Password"]);
      $password_check = mysqli_real_escape_string($conn, $_POST["C_Password"]);
	$firstname = mysqli_real_escape_string($conn, $_POST["A_Name"]);
      $lastname = mysqli_real_escape_string($conn, $_POST["A_Lastname"]);
      $section = mysqli_real_escape_string($conn, $_POST["A_Section"]);
	//Check are they empty?
	if($username != "" && $password != "" && $password_check != "" && $firstname != "" && $lastname != "" && $section != ""){
		//Check is the username has not taken
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM account WHERE A_User = '$username'")) == 0){
                  if($password == $password_check){
                        mysqli_query($conn, "INSERT INTO account (A_User,A_Password,A_Name,A_Lastname,A_Section) VALUES ('$username','$password','$firstname','$lastname','$section')");
                        echo "Check:"."1";
        		}else{
            		echo "รหัสผ่านไม่เหมือนกัน";
        		}
		}else{
			echo "บัญชีนี้ได้ถูกใช้ไปแล้ว";
		}		
	}else{
		echo "กรุณากรอกข้อมูล";
	}
}else if(isset($_POST["A_login_User"])){
	$username = mysqli_real_escape_string($conn, $_POST["A_login_User"]);
	$password = mysqli_real_escape_string($conn, $_POST["A_Password"]);
	if($username != "" && $password != ""){
		//Check are entered username and password matched
		$sql = "SELECT * FROM account WHERE A_User = '$username' AND A_Password = '$password'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "Check:"."1"."|A_ID:".$row['A_ID']."|A_Name:".$row['A_Name']."|A_Lastname:".$row['A_Lastname']."|A_Point:".$row['A_Point']."|A_Section:".$row['A_Section']."|A_Grade:".$row['A_Grade']."*";
		}
		}else{
			echo "0";
		}
	}else{
		echo "Both fields are required.";
	}
}else if(isset($_POST["A_ID"])){
	$id = mysqli_real_escape_string($conn, $_POST["A_ID"]);
	$sql = "SELECT * FROM account WHERE A_User = '$id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		echo "|A_ID:".$row['A_ID']."|A_Name:".$row['A_Name']."|A_Lastname:".$row['A_Lastname']."|A_Point:".$row['A_Point']."|A_Section:".$row['A_Section']."|A_Grade:".$row['A_Grade']."*";
	}
	}else{
		echo "0";
	}
}else{
	echo "Unity Login Logout and Register";
}

?>