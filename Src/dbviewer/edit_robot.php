
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

	$name = $_POST[name];
	$date = $_POST[date];

	$query = "insert into robot(name, date) values('$name', '$date')";
	mysqli_query($conn, "set names utf8");
	mysqli_query($conn, $query);
	mysqli_close;
?>


<script>
//window.alert("글 수정 성공");
location.href = './index.php';
</script>

