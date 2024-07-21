<?php
include 'session.php';
include 'connet.php';

$id = $_GET['id'];
$user = $_SESSION['user_name'];
// 先找出此則留言
$query_sql = "SELECT * FROM tbl_ms1 WHERE id = $id AND user = '$user'";
$result = mysqli_query($conn, $query_sql);
$row = mysqli_fetch_assoc($result);
// 確認此則留言是否存在，若存在則進行刪除
if ($row) {
   $delete_sql = "DELETE FROM tbl_ms1 WHERE id = $id AND user = '$user'";
   mysqli_query($conn, $delete_sql);
   echo "<script>alert('刪除成功');location='show.php';</script>";
} else {
   echo "<script>alert('未找到此則留言');location='show.php';</script>";
}
