<?php
session_start();
include "connet.php";

if (isset($_POST['uid']) && isset($_POST['password'])) {

    // 清理用戶輸入
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // 驗證輸入欄位
    $id = validate($_POST['uid']);
    $password = validate($_POST['password']);
    
    // 檢查欄位是否為空
    if (empty($id)) {
        header("Location: index.php?error=User name is required");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=Password is required");
        exit();
    }

    // 查詢資料庫
    $sql = "SELECT * FROM tbl_ms WHERE username='$id' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    // 檢查查詢結果，若為一條，檢查用戶名和密碼是否正確，正確即為登入成功，反之則失敗
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] === $id && $row['password'] === $password) {
            $_SESSION['user_name'] = $row['username'];
            header("Location: show.php");
            exit();
        } else {
            header("Location: index.php?error=Incorrect User Name or Password");
            exit();
        }
    } else {
        header("Location: index.php?error=Incorrect User Name or Password");
        exit();
    }
} else {
    header("Location: index.php?error=Invalid access");
    exit();
}
