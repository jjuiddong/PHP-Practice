<html>
<head>
<?php
        include('../../lib/db_connect.php');
        $conn = dbconn();
        $member = member();
?>
</head>

<body>


<table border='0' width='100%' height='1' align='center' cellspacing='0' cellpadding='0'>

<tr>
<td width='100%' height='100' align='left' valign='middle' bgcolor='#E89C05'>
&nbsp; &nbsp; <a href='../../index.php'><strong>[홈]</strong></a>
</td>
</tr>

<?php
    $_page = $_GET[_page];
    $view_total = 3;
    if (!$_page)
        $_page=1;
    $page = ($_page-1) * $view_total;

    $query = "select count(*) from bbs1 where id='bbs1'";
    $result = mysqli_query($conn, $query);
    $temp = mysqli_fetch_array($result);
    $totals = $temp[0];
?>

<tr>
<td height='50' align='center' bgcolor='#FFFFFF'> -- 자유 게시판 -- </td>
</tr>

<tr>
<td height='20' align='right' bgcolor='#FFFFFF'>
<a href='./write.php'><strong>[게시판 글쓰기]</strong></a></td>
</tr>


<tr>
    <table border='0' width='100%' height='1' align='center' bgcolor='#EODFDE' cellspacing='0' cellpadding='0'>

    <tr>
        <td class='font_tr2' width='5%' height='30' align='center' valign='middle'>no</td>
        <td class='font_tr2' width='15%' height='30' align='center' valign='middle'>이름</td>
        <td class='font_tr2' width='40%' height='30' align='center' valign='middle'>제목</td>
        <td class='font_tr2' width='15%' height='30' align='center' valign='middle'>날짜</td>
        <td class='font_tr2' width='10%' height='30' align='center' valign='middle'>hit</td>
    </tr>


    <?php
        $query = "select * from bbs1 where id='bbs1' order by no desc limit $page, $view_total";
        $result = mysqli_query($conn, $query);
        $cnt = 1;
        while ($data = mysqli_fetch_array($result))
        {
    ?>
        
        <tr>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo $cnt; ?> </td>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo $data[name]; ?> </td>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo "<a href='./view.php?no=$data[no]&id=$data[id]'> $data[subject] </a>"; ?> </td>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo $data[regdate]; ?> </td>
        <td height='25' align='center' bgcolor='#EEEEEE'> <?php echo $data[hit]; ?> </td>
        </tr>


    <?php
            $cnt++;
        }
    ?>

    </table>

<tr>
<table border='0' width='100%' height='1' align='center' cellspacing='0' cellpadding='0'>
<tr>
<td width='100%' align='center'> <?php include('./list_page.php'); ?> </td>
</tr>

</table>

</body>
</html>
