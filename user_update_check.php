<?php //判斷表單 用 return; 來避免繼續執行錯誤內容

    $password1 = ($_POST["password"]);
    $password2 = ($_POST["password2"]);

    // 確認是否有表單提交的動作，只會在表單提交之後繼續執行
    if ($_SERVER["REQUEST_METHOD"] !== "POST") { 
        return;
    }

    if (!empty($_POST["password"])){ //有輸入密碼
        // 當密碼1跟密碼2不同
        if (($password1) !== ($password2)){
            echo "密碼未相同！請重新輸入";
            return;
        }
        // 判斷密碼是否符合條件 (是否混合英文及數字)
        if (!preg_match('/^[a-zA-Z0-9]*([a-zA-Z]+[0-9]+|[0-9]+[a-zA-Z]+)[a-zA-Z0-9]*$/', ($_POST["password"]))){
            echo "<br/><font color=red>密碼要混合英文和數字並且不含特殊字元</font><br/>";
            return;
        }
        $query_update = "UPDATE  `user` SET `name` = '{$_POST["name"]}' , `password` = '{$_POST["password"]}' WHERE `account` = '$user_account'";
        $result_update = mysqli_query($connection, $query_update);
        echo "<script>setTimeout(function(){window.location.href='user_edit_update.php';},0);</script>";
    }else{ //沒輸入密碼
        $query_update = "UPDATE  `user` SET `name` = '{$_POST["name"]}' WHERE `account` = '$user_account'";
        $result_update = mysqli_query($connection, $query_update);
        echo "<script>setTimeout(function(){window.location.href='user_edit_update.php';},0);</script>";
    }

?>