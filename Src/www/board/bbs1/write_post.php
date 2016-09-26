
<?php

include('../../lib/db_connect.php');
$conn = dbconn();
$member = member();

if (!$member[user_id])
    Error( "로그인 후 이용하세요");
if (!$member[nick_name])
    Error( "로그인 후 이용하세요");
if (!$member[name])
    Error( "로그인 후 이용하세요");

$id = $_POST[id];
$user_id = $_POST[user_id];
$name = $_POST[name];
$nick_name = $_POST[nick_name];
$subject = $_POST[subject];
$story = $_POST[story];

if (!$subject)
    Error( "제목을 적으세요.");
if (!$story)
    Error( "내용을 입력하세요.");

$regdate = date("YmdHis", time());
$ip = getenv("REMOTE_ADDR");
$level = $member[level]; // 3=일반 2=관리자 1=최고관리자


$query = "INSERT INTO bbs1(id, user_id, name, nick_name, subject, story, regdate, ip, level) 
    VALUES('$id', '$user_id', '$name', '$nick_name', '$subject', '$story', '$regdate', '$ip', '$level' )";

echo $query;

if ($result = mysqli_query($conn, $query)) {
    $row = mysqli_fetch_row($result);
    printf("Default database is %s.\n", $row[0]);
    mysqli_free_result($result);
}
mysqli_close($conn);
?>


<script>
window.alert("글쓰기 성공");
location.href = './list.php';
</script>
