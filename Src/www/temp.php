
<tr>
<td width='100%' height='30' align='center' bgcolor='#EDEDED'>My SQL 데이타 생성 </td>

<tr>
<td width='100%' height='200' align='left' valign='top' bgcolor='#FFFFFF'>


<form action='./test2.php' name='test' method='post'>
	<input type='hidden' name='test' value='test'>
	<li>아이디: <input type='text' name='id' size='10'>
	<li>유저 아이디: <input type='text' name='user_id' size='10'>	
	<li>이름: <input type='text' name='name' size='10'>
	<li>비밀번호: <input type='password' name='pw' size='10'>
	<br><br>
	-메모- <br>
	<textarea name='memo' cols='100' rows='5'></textarea>
<br><br>

<input type='submit' value='전 송'>
</form>
</td>

<?php
include ("./lib/db_connect.php");
#$conn = dbconn();
#$member = member();
$query = "select * from bbs_1 where id='test'";
$result = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($result))
{
?>
	<tr>
	<td width='100%' height='30' align='left' valigh='top' bgcolor='#FFFFFF'>
-이름: <?php echo $data[name] . " " . $data[user_id] . "  " . $data[memo] ?> <br>
<hr size='0.1' />
	</td>
<?php } ?>
</tr>
