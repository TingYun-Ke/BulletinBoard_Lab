<?php
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "msgboard";
// 連結DB
$conn = mysqli_connect($sname, $uname, $password, $db_name);
// 確認是否連接成功
if (!$conn) {
    echo "<script>alert('Connection Failed')</script>";
}
