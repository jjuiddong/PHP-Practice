
<?php
	$servername = "localhost";
	$username = "root";
	$password = "1111";
	$db_name = "acs";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . $conn->connect_error);
	}

	mysqli_select_db($conn, $db_name);

	$id = $_POST[num];

	$query = "delete from robot where id='$id'";
	mysqli_query($conn, "set names utf8");
	mysqli_query($conn, $query);
	mysqli_close;
?>


<script>
//window.alert("글 수정 성공");
location.href = './index.php';
</script>

