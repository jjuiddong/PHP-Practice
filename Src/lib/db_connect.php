<?php

function dbconn()
{
    $host_name = "localhost";
    $user_id = "root";
    $db_name = "web";
    $db_pw = "1111";
    $conn = mysqli_connect($host_name, $user_id, $db_pw);
    if (!$conn)
    {
	    die("연결 실패" . mysqli_connect_error());
        return $conn;
    }
    mysqli_query($conn, "set names utf8");
    mysqli_select_db($conn, $db_name);
    return $conn;
}

function Error($msg) 
{
    echo "
    <script>
    window.alert( '$msg' );
    history.back(1);
    </script>
    ";
    exit; // 아래 코드로 내려가지 않음. 종료.
}

function member() 
{
    global $conn;
    $tmps = $_COOKIE["cookies"];
    $cookies = explode("//", $tmps);

    $query = "select * from member where user_id='$cookies[0]'";
    $result = mysqli_query($conn, $query);
    $member = mysqli_fetch_array($result);
    return $member;
}

?>
