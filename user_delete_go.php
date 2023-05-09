<?php
    // 確認是否有表單提交的動作，只會在表單提交之後繼續執行
    if ($_SERVER["REQUEST_METHOD"] !== "POST") { 
        return;
    }
    $query_delete = "DELETE FROM `user` WHERE `account` = '$user_account'";
    $result_update = mysqli_query($connection, $query_delete);
        echo "<script>setTimeout(function(){window.location.href='user_delete_ok.php';},0);</script>";
?>