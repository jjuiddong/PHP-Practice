<?php

$id = $_POST[id];
$user_id = $_POST[user_id];
$name = $_POST[name];
$pw = $_POST[pw];
$memo = $_POST[memo];

$regdate=date("ymdHms", time());
$ip=getenv("REMOTE_ADDR");


$servername = "localhost";
$username = "root";
$password = "1111";

// Create connection
$connect = mysqli_connect($servername, $username, $password);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully \n";


/* return name of current default database */
if ($result = mysqli_query($connect, "SELECT DATABASE()")) {
    $row = mysqli_fetch_row($result);
    printf("Default database is %s.\n", $row[0]);
    mysqli_free_result($result);
}


mysqli_select_db($connect, "web");


/* return name of current default database */
if ($result = mysqli_query($connect, "SELECT DATABASE()")) {
    $row = mysqli_fetch_row($result);
    printf("Default database is %s.\n", $row[0]);
    mysqli_free_result($result);
}


$query = "INSERT INTO bbs_1(id, user_id, name, pw, memo, regdate, ip) VALUES('$id', '$user_id', '$name', '$pw', '$memo', '$regdate', '$ip')";
echo "mysqli_query '$query' \n";

mysqli_query($connect, "set names utf8");


if ($result = mysqli_query($connect, $query)) {
    $row = mysqli_fetch_row($result);
    printf("Default database is %s.\n", $row[0]);
    mysqli_free_result($result);
}

mysqli_close($connect);

?>

<script>
window.alert("쿼리 성공");
location.href = './index.php';
</script>