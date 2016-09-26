<html>
<head>
<title>게시판 글보기</title>
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
&nbsp; &nbsp;<strong>[게시판 글 보기]</strong> </td>
</tr>

<tr>
<table border='0' width='80%' height='1' align='center' valign='top' cellspacing='0' cellpadding='0'>

<?php
    $query = "select * from bbs1 where no='$no' and id='$id' ";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);
?>


    <tr>
    <td height='1' align='left' valign='middle' bgcolor='#FFFFFF'>
    <li>이름(아이디): <?php echo "$data[name] ($data[user_id])"; ?> &nbsp;&nbsp;닉네임: <?php echo $data[nick_name]; ?> </td>
    </tr>

    <tr>
    <td height='1' align='left' valign='middle' bgcolor='#FFFFFF'>
    <li>글 제목: <?php echo $data[subject]; ?> </td>
    </tr>

    <tr>
    <td height='1' align='left' valign='middle' bgcolor='#FFFFFF'>
    <hr size='5' color='#94A0FC' />
    <li>글 내용
    <br>
    <?php echo nl2br($data[story]); ?>
    <br><br>
    </td>
    </tr>

    <tr>
    <td> <input type=file name=file1> </td>
    </tr>


    <tr>
    <td height='1' align='left' valign='middle' bgcolor='#EEEEEE'>
    <?php echo "<a href='edit.php?no=$data[no]&id=$data[id]'>"; ?> 수정</a> 
    &nbsp;&nbsp;
    <?php echo "<a href='del.php?no=$data[no]&id=$data[id]'"; ?> onclick="return confirm('정말 삭제?');"> 삭제</a>
    </td>
    </tr>

</table>
</tr>


</table>
</body>
</html>
