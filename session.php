<?php
session_start();

// 設定會話超時時間（以秒為單位）
$timeout_duration = 900;

// 檢查會話是否新建或是否已經超時
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    // 最後一次請求時間超過設定時間，銷毀會話
    session_unset();
    session_destroy();
    header("Location: index.php?error=登入已超時"); // 重新導向到登入頁面並提醒超時
    exit();
}

// 更新最後活動時間戳
$_SESSION['LAST_ACTIVITY'] = time();

// 在需要檢查會話是否過期的文件中包含此檔案
