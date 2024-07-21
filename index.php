<html>

<head>
    <title>登入</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/index1.css">
    <style>
        body {
            height: 100%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div class="index_01">
        <table style="width: 100%;height:100%;">
            <tr>
                <td align="center">
                    <table align="center" width=350 height=230; class="index_table">
                        <form method="post" action="login.php" name="frmLogin">
                            <tr align="center" style="font-size:25px;">
                                <td colspan="2" style="font-size:35px;">用戶登入</td>
                            </tr>
                            <?php
                            if (isset($_GET['error'])) {
                                echo '<tr><td colspan="2" class="error-message">' . htmlspecialchars($_GET['error']) . '</td></tr>';
                            }
                            ?>
                            <tr>
                                <td align="center" style="font-size:25px;">用戶名</td>
                                <td><input name="uid" type="name" maxlength="16" placeholder="請輸入帳號" style="width:180px;font-size:20px;border-radius: 8px; "></td>
                            </tr>
                            <tr>
                                <td align="center" style="font-size:25px;">密碼</td>
                                <td><input name="password" type="password" maxlength="16" placeholder="請輸入密碼" style="width:180px;font-size:20px;border-radius: 8px; "></td>
                            </tr>
                            <tr align="center">
                                <td colspan="2">
                                    <input type="submit" name="denglu" value="登入" class="btn">
                                    <input type="reset" name="rs" value="重置" class="btn">
                                    <input type="button" name="zu" value="註冊" onclick="window.location.href='register.php'" class="btn" />
                                </td>
                            </tr>
                        </form>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>