<?php
include "session.php";
header('Content-type: text/html; charset=UTF8');
?>
<html>

<head>
    <title>我的留言板.查看留言</title>
    <link rel="stylesheet" type="text/css" href="./css/index1.css">
</head>

<body background="./images/plain.jpg" style="background-size:cover;">
    <center>
        <h2>我的留言板</h2>
        <input type="button" value="添加留言" onclick="location.href='add.php'" class="button" />
        <input type="button" value="查看留言" onclick="location.href='show.php'" class="button" />
        <input type="button" value="退出登入" onclick="location.href='logout.php'" class="button" />
        <hr width="70%">
    </center>
    <?php
    include "connet.php";
    mysqli_query($conn, "set names 'utf8'");
    // 設定每頁顯示的留言數量
    $pagesize = 5;
    $p = isset($_GET['p']) ? $_GET['p'] : 1;
    $offset = ($p - 1) * $pagesize;
    // 根據當前頁數計算資料偏移量 $offset
    $id = $_SESSION["user_name"];
    $query_sql = "SELECT * FROM tbl_ms1 
                  ORDER BY 
                      CASE 
                          WHEN user = '$id' THEN 0 
                          ELSE 1 
                      END, 
                      id DESC 
                  LIMIT $offset, $pagesize";    $result = mysqli_query($conn, $query_sql);
    // 顯示每條留言的作者、時間、主題和內容，如果留言者是當前用戶，顯示「修改」和「刪除」按鈕，如果留言有附檔，顯示附檔名稱及下載連結
    echo "<div style='margin-top:55px'>";
    while ($res = mysqli_fetch_array($result)) {
        echo "<div class='k'>";
        echo "<div class='ds-post-main'>";
        echo "<div class='ds-comment-body'>
            <span>{$res['author']}  於  {$res['time']}  给我留言</span>";
        if ($res['user'] == $id) {
            echo "<span style='float:right'>
                    <a href='edit.php?id={$res['id']}'><input type='submit' class='button1' value='修改'></input></a>
                    <a href='del.php?id={$res['id']}'><input type='submit' class='button1' value='刪除'></input></a>
                </span>";
        }
        echo "<p>留言主题 : {$res['title']}</p>
            <hr width=450px> 
            <p>留言內容 : {$res['liuyan']}</p>";

        // 顯示附件
        if (!empty($res['file_name'])) {
            echo "<p>附件：</p>";
            $files = explode(',', $res['file_name']);
            $counter = 1;
            foreach ($files as $file) {
                echo "下載附件{$counter} : <a href='uploads/{$file}' download>{$file}</a><br>";
                $counter++;
            }
        }
        echo "</div><br>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";

    $count_result = mysqli_query($conn, "SELECT count(*) AS count FROM tbl_ms1");
    $count_array = mysqli_fetch_array($count_result);
    $pagenum = ceil($count_array['count'] / $pagesize);
    // 顯示總留言數和總頁數
    echo "<center>";
    echo "<div style='display: inline-block;margin-right: 15px;margin-left:15px;'>共{$count_array['count']}條留言</div>";
    echo "<div style='display: inline-block;margin-right: 15px;margin-left:15px;'>共{$pagenum}頁</div>";
    // 根據總頁數生成分頁連結，顯示當前頁數
    if ($pagenum > 1) {
        for ($i = 1; $i <= $pagenum; $i++) {
            if ($i == $p) {
                echo "<div style='background:#e8ffc4;width:25px;display: inline-block;margin-right: 10px;'>$i</div>";
            } else {
                echo "<a href='show.php?p=$i'><div style='width:25px;display: inline-block;margin-right: 10px;background:#FF9D6F'>$i</div></a>";
            }
        }
        echo "<div style='display: inline-block;margin-right: 10px;'>當前在 $p 頁</center></div>";
    }
    echo "<br><br><br></div>";
    ?>
</body>

</html>