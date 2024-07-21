<html>

<head>
    <title>註冊</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/index1.css">
    <style>
        body {
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="index_01">
        <table style="width: 100%;height:100%;">
            <tr>
                <td align="center">
                    <form action="doregister.php " name="dl" method="post">
                        <table align="center" width=350 height=230; style="font-family:宋体;font-size:25px;">
                            <tr align="center">
                                <td colspan="2" style="font-size:35px;">註冊用戶</td>
                            </tr>
                            <tr>
                                <td align="center">用戶名</td>
                                <td>
                                    <input type="name" maxlength="20" name="id" placeholder="請輸入姓名/暱稱" style="width:180px;font-size:20px;border-radius: 8px; ">
                                </td>
                            </tr>
                            <tr>
                                <td align="center">密碼</td>
                                <td>
                                    <input name="password" type="password" maxlength="16" placeholder="請輸入密碼" style="width:180px;font-size:20px;border-radius: 8px; ">
                                </td>
                            </tr>
                            <tr>
                                <td align="center">Again</td>
                                <td>
                                    <input name="confirmPassword" type="password" maxlength="16" placeholder="請再次輸入密碼" style="width:180px;font-size:20px;border-radius: 8px; ">
                                </td>
                            </tr>
                            <?php
                            if (isset($_GET['error'])) {
                                echo '<tr><td colspan="2" class="error-message">' . htmlspecialchars($_GET['error']) . '</td></tr>';
                            }
                            ?>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="button" name='zu' value='返回' onclick="location.href='index.php'" style="font-size:17px;border-radius: 12px;" class="btn" />
                                    <input type="reset" name="zu" value="重置" style="font-size:17px;border-radius: 12px;" class="btn">
                                    <input type="submit" name="zu" value="註冊" style="font-size:17px;border-radius:12px;" class="btn" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>
<html>