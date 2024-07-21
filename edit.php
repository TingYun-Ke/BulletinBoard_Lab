<?php
include 'session.php';
include 'connet.php';

mysqli_query($conn, "set names 'utf8'");

$id = $_GET['id'];
$user = $_SESSION['user_name'];

$query_sql = "SELECT * FROM tbl_ms1 WHERE id = $id AND user = '$user'";
$result = mysqli_query($conn, $query_sql);
$row = mysqli_fetch_assoc($result);

?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="./css/index1.css">
    <title>我的留言板.修改留言</title>
</head>

<body background="./images/plain.jpg" style="background-size:cover;">
    <center>
        <h2>我的留言板</h2>
        <input type="button" value="添加留言" onclick="location.href='add.php'" class="button" />
        <input type="button" value="查看留言" onclick="location.href='show.php'" class="button" />
        <input type="button" value="退出登入" onclick="location.href='logout.php'" class="button" />
        <hr width="70%">
    </center>
    <div class="k1">
        <form action="doEdit.php" method="POST" enctype="multipart/form-data">
            <h1>Edit Message
                <span>Update your message</span>
            </h1>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            <label>
                <span>Your Name :</span>
                <input type="text" name="author" value="<?php echo $row['author']; ?>" />
            </label>
            <label>
                <span>Title :</span>
                <input type="text" name="title" value="<?php echo $row['title']; ?>" />
            </label>
            <label>
                <span>Message :</span>
                <textarea name="content"><?php echo $row['liuyan']; ?></textarea>
            </label>
            <label>
                <span>Current Attachments :</span>
                <div>
                    <?php
                    if (!empty($row['file_name'])) {
                        $files = explode(',', $row['file_name']);
                        foreach ($files as $file) {
                            echo "<div>
                                    <a href='uploads/$file' download>$file</a>
                                    <input type='checkbox' name='delete_files[]' value='$file'> Delete
                                  </div>";
                        }
                    }
                    ?>
                </div>
            </label>
            <label>
                <span>Attachments :</span>
                <input type="file" name="files[]" multiple accept=".pdf,.doc,.docx,.jpg" />
            </label>
            <div style="margin-left:125px">
                <input type="submit" value="提交" class="submit">
                <input type="reset" value="重置" class="reset">
            </div>
        </form>
    </div>
</body>

</html>