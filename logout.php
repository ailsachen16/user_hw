<?php
    session_start();
    $_SESSION = array();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="zh-tw">
    <head>
        <meta charset="utf-8">
        <title>會員登出</title>
    </head>
    <body>
        
        <h1 class="title">會員登出</h1>
        <p>
            登出成功！
        </p>
        
    </body>
    <?php
        // echo "測試session是否還存在(空白為成功)：".$_SESSION['UserName']. $_SESSION['account'];
        echo "<script>setTimeout(function(){window.location.href='index.php';},2000);</script>";
    ?>
    
</html>