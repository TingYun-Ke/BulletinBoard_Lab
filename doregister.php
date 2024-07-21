<?php
include "connet.php"; // 包含數據庫連接文件

$id = $_POST['id'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// 檢查密碼和確認密碼是否一致
if ($password != $confirmPassword) {
    header("Location: register.php?error=密碼和再確認密碼不相等");
    exit;
}

// 檢查用戶名是否已存在
$selectSql = "SELECT * FROM tbl_ms WHERE username='$id'";
$result = mysqli_query($conn, $selectSql);

if ($result) {
    if (mysqli_num_rows($result) < 1) {
        // 插入新用戶
        $insertSql = "INSERT INTO tbl_ms (username, password) VALUES ('$id', '$password')";
        if (mysqli_query($conn, $insertSql)) {
            echo "<script>alert('註冊成功');location='index.php';</script>";
        } else {
            header("Location: register.php?error=註冊失敗，請再次輸入帳號和密碼");
        }
    } else {
        header("Location: register.php?error=註冊失敗，該帳號已被註冊！");
    }
} else {
    header("Location: register.php?error=註冊失敗，請再次輸入帳號和密碼");
}
?>
