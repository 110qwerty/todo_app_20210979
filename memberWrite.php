<html>
<!-- <meta charset="utf-8"> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<?php

		$host = 'localhost';
		$user = 'itheeah';
		$pw = '1234';
		$dbName = 'study';
		$mysqli = new mysqli($host, $user, $pw, $dbName);

		$member_email = $_POST['email'];
	    $member_pw_1 = $_POST['pw_1'];
	    $member_name = $_POST['name'];
		$member_Phone = $_POST['Phone'];

		$sql = "insert into member (
				member_email,
				member_pw_1,
				member_name,
				member_Phone
		)";
		
		$sql = $sql. "values (
				'$member_email',
				'$member_pw_1',
				'$member_name',
				'$member_Phone'
		)";

		if($mysqli->query($sql)){ 
		  echo '<script>alert("success inserting")</script>'; 
		}else{ 
		  echo '<script>alert("fail to insert sql")</script>';
		}

		mysqli_close($mysqli);
	  
	?>

<script>
	location.href = "member_create.html";
</script>

</html>