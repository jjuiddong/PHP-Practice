<?php

include("../lib/db_connect.php");
$conn = dbconn();

$id = $_POST[id];
$user_id = $_POST[user_id];
$name = $_POST[name];
$nick_name = $_POST[nick_name];
$birth = $_POST[birth];
$sex = $_POST[sex];
$tel = $_POST[tel];
$email = $_POST[email];
$pws = $_POST[pw];
$pw = md5($pws);
$addr_1 = $_POST[addr_1];
$addr_2 = $_POST[addr_2];
$regdate = date("YmdHis", time());
$ip = getenv("REMOTE_ADDR");

if (preg_match("/[^a-z 0-9]/", $user_id))
    Error("아이디는 소문자, 숫자만 가능");
if (strlen($name)<6 or strlen($name)>15)
    Error("2~3 글자의 한글 이름만 가능");

if (!$user_id)
    Error("아이디를 입력하세요.");
if (!$name)
    Error("이름을 입력하세요.");
if (!$birth)
    Error("생년월일을 입력하세요.");
if (!$pws)
    Error("비밀번호를 입력하세요.");
if (!$user_id != substr($user_id, 12))
    Error("12자 안으로 설정.");

if ($email && preg_match("(^[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]*@[0-9a-zA-Z-]+)*$)", $email))
    Error("이메일 이름이 잘못되었습니다.");

$query = "insert into member(id, user_id, name, nick_name, birth, sex, tel, email, pw, addr_1, addr_2, regdate, ip)
values('$id', '$user_id', '$name', '$nick_name', '$birth', '$sex', '$tel', '$email', '$pw', '$addr_1', '$addr_2', '$regdate', '$ip')";

mysqli_query($conn, "set names utf8");
mysqli_query($conn, $query);
mysqli_close;
?>


<script>
window.alert("회원 가입 성공");
location.href = "../index.php";
</script>
