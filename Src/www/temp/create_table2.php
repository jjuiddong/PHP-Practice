
<?php

include("../lib/db_connect.php");
$conn = dbconn();

$sql = "CREATE TABLE bbs1 (
no int not null auto_increment,
PRIMARY KEY(no),
id char(32),
level int,
user_id char(32),
name char(32),
nick_name char(32),
email char(32),
subject char(32),
story text,
hit int,
regdate char(32),
ip char(32)
)";

mysqli_query($conn, $sql);
if (!$sql) die("테이블 생성 실패" . mysqli_error());

echo "테이블 생성 성공";
?>
