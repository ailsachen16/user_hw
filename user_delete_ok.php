<?php
    session_start();
    $_SESSION = array();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="zh-tw">
    <head>
        <meta charset="utf-8">
        <title>刪除成功</title>

    </head>
    <body>
        <h1 class="title">會員資料刪除成功！即將為您跳轉...</h1>
    </body>
</html>
<?php
echo "<script>setTimeout(function(){window.location.href='index.php';},2000);</script>";
?>