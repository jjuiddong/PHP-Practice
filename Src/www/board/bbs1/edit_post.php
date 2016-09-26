
<?php

include('../../lib/db_connect.php');
$conn = dbconn();
$member = member();

if (!$member[user_id])
    Error("로그인 후 이용해주세요");


$id = $_POST[id];
$no = $_POST[no];
$subject = $_POST[subject];
$story = $_POST[story];

if (!$subject)
    Error("제목이 없음");
if (!$story)
    Error("내용이 없음");

$query = "update bbs1 set subject='$subject', story='$story' where id='$id' and no='$no' ";
mysqli_query($conn, $query);
mysqli_close;
?>


<script>
window.alert("글 수정 성공");
location.href = './list.php';
</script>
