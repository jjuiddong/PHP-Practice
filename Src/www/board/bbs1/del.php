
<?php
include('../../lib/db_connect.php');
$conn = dbconn();
$member = member();

if (!$member[user_id])
    Error("로그인 후 이용해주세요");


$no = $_GET[no];
$id = $_GET[id];
$user_id = $member[user_id];

$query = "delete from bbs1 where no='$no' and id='$id' and user_id='$user_id' ";
mysqli_query($conn, $query);
mysqli_close;
?>


<script>
window.alert("삭제 성공");
location.href = './list.php';
</script>
