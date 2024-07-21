<?php
include 'session.php'; // 包含會話文件
include 'connet.php'; // 包含數據庫連接文件

$id = $_POST["id"];
$user = $_SESSION["user_name"];
$author = $_POST["author"];
$title = $_POST["title"];
$content = $_POST["content"];
$ip = $_SERVER["REMOTE_ADDR"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 處理文件上傳
    if (!empty($_FILES['files']['name'][0])) {
        $file_names = [];

        foreach ($_FILES['files']['name'] as $key => $name) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($name);
            if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $target_file)) {
                $file_names[] = $name; // 存儲文件名而不是完整路徑
            } else {
                echo "<script>alert('Failed to move uploaded file $name.')</script>";
            }
        }

        $files = implode(',', $file_names); // 將文件名數組轉換為字符串
    } else {
        $files = ''; // 如果沒有上傳文件，則設置為空
    }

    // 更新資料庫中的數據
    $sql = "UPDATE tbl_ms1 SET title = '$title', author = '$author', ip = '$ip', liuyan = '$content', file_name = '$files', time = now() WHERE id = $id AND user = '$user'";
    if (mysqli_query($conn, $sql) === TRUE) {
        echo "<script>alert('修改成功');location='show.php';</script>";
        exit();
    } else {
        echo "<script>alert('修改失敗');location='edit.php'</script>";
    }
} else {
    // 驗證輸入字段
    if ($author == null) {
        echo "<script>alert('請輸入留言者！');location='edit.php';</script>";
    }
    if ($title == null) {
        echo "<script>alert('請輸入留言標題！');location='edit.php';</script>";
    }
}
?>
