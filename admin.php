<!--

-->

<?php
    session_start();

    if(!isset($_SESSION['account'])) {
        // echo "isset-ok";
        header('Location: login.php'); //若無session資料則跳轉到登入頁面
    }
?>

<!DOCTYPE html>
<html lang="zh-tw">
    <head>
        <meta charset="utf-8">
        <title>會員後台</title>

    </head>
    <body>
        
        <h1 class="title">會員後台</h1>
        <p>
            <?php
                echo "歡迎回來".$_SESSION['UserName']."(帳號:". $_SESSION['account'].")";
            ?>
        </p>
        <p><a href="https://zhangti.net/codetest/user_edit.php">修改會員資料</a></p>
        <p><a href="https://zhangti.net/codetest/logout.php">登出</a></p>
        <p>其他的還沒想到</p>
    </body>
</html>