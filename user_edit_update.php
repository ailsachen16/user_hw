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
        <title>更新成功</title>

    </head>
    <body>
        <h1 class="title">會員資料更新成功！即將為您跳轉...</h1>
    </body>
</html>
<?php
echo "<script>setTimeout(function(){window.location.href='admin.php';},2000);</script>";
?>