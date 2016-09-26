<?php ob_start;

include("../lib/db_connect.php");
$conn = dbconn();

$user_id = $_POST[user_id];
$pws  = $_POST[pw];
$pw = md5($pws);

$query = "select * from member where user_id='$user_id'";
mysqli_query($conn, "set names utf8");
$result = mysqli_query($conn, $query);
$member = mysqli_fetch_array($result);

if (!$user_id)
    Error("아이디를 입력하세요");
elseif (!$member[user_id])
    Error("없는 아이디 입니다.");

if (!$pw)
    Error("비밀번호를 입력하세요");
elseif ($member[pw] != $pw)
    Error("비밀번호가 맞지 않습니다.");

if ($member[user_id] and $member[pw] == $pw)
{
    $tmp = $member[user_id] . "//" . $member[pw];
    setcookie("cookies", $tmp, time()+60*60*24, "/"); // 24 hours
}
?>

<script>
window.alert("로그인 성공");
location.href="../index.php";
</script>



