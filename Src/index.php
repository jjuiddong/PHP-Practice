<html>
<header>
	<title>Test</title>
	<link type='text/css' href='./lib/m_style.css' rel='stylesheet'>
</header>


<body>

<table border='0' width='100%' height='1' align='center' cellspacing='0' cellpadding='0'>

<?php
	include ("./lib/db_connect.php");
	$conn = dbconn();
	$member = member();
	if($member[user_id])
	{
		echo "<tr> <td width='100%' height='100' align='right'>";
		echo $member[name] . "(" . $member[user_id] . ") 님 환영합니다.";
		echo "&nbsp;&nbsp <a href='./member/logout.php'> <strong>[로그아웃]</strong></a>";
		echo "</td></tr>";
	}
	else
	{
	?>
	<tr>
	<td width='100%' height='100' align='right'><a href='./member/join.php'> <strong>[회원가입]</strong></a> &nbsp;&nbsp;
	<a href='./member/login.php'> <strong>[로그인]</strong></a> &nbsp;&nbsp;
	</td>
	<?php 
	} 
?>

<tr>
<td width='100%' height='100' align='left' bgcolor=#452403 valign='center'>
&nbsp;&nbsp;
<a href='./board/bbs1/list.php'><font color=#FFFFFF>[자유 게시판]</font></a> &nbsp;&nbsp;
</tr>

<tr>
<td width='100%' height=100 align='center' valign='middle' bgcolor=#FFFFFF valign='center'>
Main Board <td>
</tr>

</body>
</html>
