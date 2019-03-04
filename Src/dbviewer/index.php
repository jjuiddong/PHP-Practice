<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<header>
	<title>DB Viewer</title>
</header>


<body>

<table border='0' width='100%' height='1' align='center' bgcolor=#452403  cellspacing='0' cellpadding='0'>
<tr>
<td class='font_tr2' width='5%' height='100' align='center' valign='middle'><font color='white'><strong>DB Viewer</td>	
</tr>
</table>


<?php
$servername = "localhost";
$username = "root";
$password = "1111";
$db_name = "acs";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
	die("Connection failed: " . $conn->connect_error);
}

	mysqli_select_db($conn, $db_name);
?>


<!--
	Robot
!-->

	<table border='0' width='100%' height='1' align='center' cellspacing='0' cellpadding='0'>
	   	<tr>
	        <td height='30' align='center' bgcolor='#EEEEEE'> <strong>Robot</strong> </td>
	   	</tr>
		</table>

	    <table border='0' width='100%' height='1' align='center' bgcolor='#EODFDE' cellspacing='0' cellpadding='0'>

	    <tr>
	        <td class='font_tr2' width='5%' height='30' align='center' valign='middle'>No</td>
	        <td class='font_tr2' width='30%' height='30' align='center' valign='middle'>이름</td>
	        <td class='font_tr2' width='65%' height='30' align='center' valign='middle'>날짜</td>
	    </tr>


<?php
	$robotQueury = "select * from robot";
	$robotResult = mysqli_query($conn, $robotQueury);

	$cnt = 1;
	while ($data = mysqli_fetch_array($robotResult))
	{
?>		
		<tr>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo $data[id]; ?> </td>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo $data[name]; ?> </td>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo $data[date]; ?> </td>
    	</tr>
<?php
		$cnt++;
	}
?>

	</table>


<!--
	Robot Edit (Insert)
!-->

	<table border='0' width='80%' height='1' align='center' valign='top' cellspacing='0' cellpadding='0'>
		<form action='./edit_robot.php' name='robot' method='post'>
		    <tr>
		    <td height='30' align='left' valign='middle' bgcolor='#FFFFFF'>
		    <li>Name:&nbsp;&nbsp;<input name='name' value='Robot1' /></td>
		   	<td>Date:&nbsp;&nbsp;<input name='date' value='2019-03-03 22:00:05' /></td>
			<td height='1'><input type=submit value='Add' /> </td>
		    </tr>
		</form>

		<form action='./edit_robot_remove.php' name='robot' method='post'>
		    <tr>
		    <td height='30' align='left' valign='middle' bgcolor='#FFFFFF'>
		    <li>No:&nbsp;&nbsp;<input name='num' value='1' /></td>
			<td height='1'><input type=submit value='Delete' /> </td>
		    </tr>
		</form>

	</table>



<!--
	Log
!-->

	<table border='0' width='100%' height='1' align='center' cellspacing='0' cellpadding='0'>
	   	<tr>
	        <td height='30' align='center' bgcolor='#EEEEEE'> <strong>Log</strong> </td>
	   	</tr>
		</table>

	    <table border='0' width='100%' height='1' align='center' bgcolor='#EODFDE' cellspacing='0' cellpadding='0'>

	    <tr>
	        <td class='font_tr2' width='5%' height='30' align='center' valign='middle'>No</td>
	        <td class='font_tr2' width='15%' height='30' align='center' valign='middle'>이름</td>
	        <td class='font_tr2' width='15%' height='30' align='center' valign='middle'>날짜</td>
	        <td class='font_tr2' width='65%' height='30' align='center' valign='middle'>메세지</td>
	    </tr>


<?php
	$logQueury = "select * from log where name='Robot1'";
	$logResult = mysqli_query($conn, $logQueury);

	$cnt = 1;
	while ($data = mysqli_fetch_array($logResult))
	{
?>		
		<tr>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo $cnt; ?> </td>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo $data[name]; ?> </td>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo $data[date]; ?> </td>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo $data[message]; ?> </td>
    	</tr>
<?php
		$cnt++;
	}
?>

	</table>


</body>
</html>
