<html>
<head>
<title>글 수정</title>
<?php
    include('../../lib/db_connect.php');
    $conn = dbconn();
    $member = member();
    
    if (!$member[user_id])
        Error("로그인 후 이용해주세요");

    $no = $_GET[no];
    $id = $_GET[id];
?>
</head>


<body>

<table border='0' width='100%' height='1' align='center' valign='top' cellspacing='0' cellpadding='0'>
<tr>
<td width='10%' height='100' align='left' valign='middle' bgcolor='#E89C05'>
&nbsp; &nbsp; <a href='./list.php'><strong>[게시판]</strong></a>
</tr>

<tr>
<td width='100%' height='100' align='center' valign='middle' bgcolor='#EEEEEE'>
&nbsp; &nbsp;<strong>[글 수정]</strong> </td>
</tr>

<tr>
<table border='0' width='80%' height='1' align='center' valign='top' cellspacing='0' cellpadding='0'>

<?php
    $query = "select * from bbs1 where no='$no' and id='$id' ";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);
?>

    <form action='./edit_post.php' name='bbs1' method='post'>

    <input type=hidden name='id' value='bbs1' />
    <input type=hidden name='no' value=<?php echo $no; ?> />

    <tr>
    <td height='1' align='left' valign='middle' bgcolor='#FFFFFF'>
    <li>이름(아이디): <?php echo "$data[name] ($data[user_id])"; ?> &nbsp;&nbsp;닉네임: <?php echo $data[nick_name]; ?> </td>
    </tr>

    <tr>
    <td height='1' align='left' valign='middle' bgcolor='#FFFFFF'>
    <li>글 제목: <input type='text' name='subject' value= <?php echo $data[subject]; ?> /> </td>
    </tr>

    <tr>
    <td height='1' align='left' valign='middle' bgcolor='#FFFFFF'>
    <hr size='5' color='#94A0FC' />
    <li>글 내용
    <br>
    <textarea rows='10' cols='50' name='story' >
<?php echo $data[story]; ?> 
    </textarea>
    <br><br>
    </td>
    </tr>

    <tr>
    <td align='center'>
    <input type=submit value='전 송' /> </td>
    </tr>

    </from>




</table>
</tr>


</table>
</body>
</html>
