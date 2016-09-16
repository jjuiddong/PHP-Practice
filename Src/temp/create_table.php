
<?php

include("./lib/db_connect.php");

$conn = dbconn();

$sql = "CREATE TABLE member
(no int not null auto_increment,
PRIMARY KEY(no),
id char(32),
user_id char(32),
name char(32),
nick_name char(32),
birth char(32),
sex char(32),
tel  char(32),
email char(32),
pw char(32),
addr_1 char(64),
addr_2 char(64),
regdate char(32),
ip char(32)
)";


mysqli_query($conn, $sql);
if (!$sql) die("테이블 생성 실패" . mysqli_error());

?>
