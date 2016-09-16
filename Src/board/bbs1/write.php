
<html>
<head>
<title> 게시판 글쓰기 </title>

<?php
    include('../../lib/db_connect.php');
    $conn = dbconn();
    $member = member();
?>
</head>


<body>

<table border='0' width='100%' height='1' align='center' valign='top' cellspacing='0' cellpadding='0'>
<tr>
<td width='100%' height='100' align='left' valign='middle' bgcolor='#E89C05'>
&nbsp; &nbsp; <a href='../../index.php'><strong>[홈]</strong></a>
</tr>

<tr>
<td width='100%' height='1' align='center' valign='middle' bgcolor='#EEEEEE'>
    <table border='0' width='70%' height='70' align='center' valign='top' cellspacing='0' cellpadding='0'>
    
    <form action='./write_post.php' name='bbs1' method='post'>
        <td height='50' align='center'>
        - 자유게시판 글쓰기 - </td>
    </tr>

    <tr>
    <td align='left'> <input type='hidden'name='id' value='bbs1'> </td>
    </tr>

    <tr>
    <td align='left'>
    <li>아이디 <input type='text'name='user_id' readonly='readonly' value=<?php echo "$member[user_id]";?>> </td>
    </tr>

    <tr>
    <td align='left'>
    <li>이름 <input type='text'name='name' readonly='readonly' value=<?php echo "$member[name]";?> >
    &nbsp;&nbsp; 닉네임 <input type='text'name='nick_name' readonly='readonly' value=<?php echo "$member[nick_name]";?> >    
    </td>
    </tr>

    <tr>
    <td align='left'>
    <li>제목 <input type='text'name='subject' size=60>
    </td>
    </tr>

    <tr>
    <td align='center'>
    <br><input type='textarea'name='story' style="width:80%; height:400px;" >
    </td>
    </tr>

    <tr>
    <td align='center'> <br><input type='submit' value='전 송'> </td>
    </tr>

    <tr>
    <td align='center'>
    <br><br>
    </td>
    </tr>
    
    </form>
    </table>
</td>
</tr>
</table>

</body>
</html>
