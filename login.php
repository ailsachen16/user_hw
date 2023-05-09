<!--

-->


<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="zh-tw">
    <head>
        <meta charset="utf-8">
        <title>使用者登入</title>

    </head>
    <body>
        
        <h1 class="title">表單練習：登入會員</h1>
        <form method="post">
            <div class="user_form">
                <p>帳號：</p>
                    <p><input type="text" name="account" placeholder="輸入帳號" minlength="3" required /></p>
                
                <p>密碼：</p>
                <p><input type="password" name="password" placeholder="輸入密碼" minlength="8"  required /></p>
                
                <p><input type="submit" value="登入" /></p>
            </div>
        </form>

    </body>



<!--資料庫連接-->

<?php
    require_once 'db.php'; //連接資料庫

$result_login = mysqli_query($connection,$sql_login);

if ($result_login){
    // echo mysqli_num_rows($result_login)."<=資料數<br/>";
    if (mysqli_num_rows($result_login)>0){
        while ($row_login = mysqli_fetch_assoc($result_login)){
            $datas_login[] = $row_login;
            $account_row[] = $row_login['account']; //帳號array
            $password_row[] = $row_login['password']; //密碼array
            $name_row[] = $row_login['name']; //密碼array
        }
    }
    mysqli_free_result($result_login); // 釋放資料庫查到的記憶體

}else{
    echo "{$sql_login} 語法執行失敗 : ".mysqli_error($connection);
}


?>





<?php

    if ($_SERVER["REQUEST_METHOD"] !== "POST") { //有按登入才繼續下面動作
        return;
    }
    $re_acc = 1;
    foreach ($account_row as $acc_row){ 
        if (($_POST["account"]) == $acc_row){
            $re_acc ++; //如果有這個帳號就+1
        }
    }
    
    if ($re_acc == 1){
        echo "查無此帳號";
        return;
    }
    
    $key_search = array_search($_POST["account"],$account_row); //搜尋帳號$key位置
    // echo $password_row[$key_search]."<br/>"; //$key值找出密碼$value
    if (($_POST["password"]) !== ($password_row[$key_search])){
        echo "密碼錯誤，請重新輸入！";
        return;
    }
    $UserName =  $name_row[$key_search]; //$key值找出name$value存在$UserName
    $_SESSION['UserName'] = $UserName;
    $_SESSION['account'] = $_POST["account"];
    echo "歡迎回來".$_SESSION['UserName']."<br/>";
    echo "<script>setTimeout(function(){window.location.href='user_login_ok.php';},0);</script>";
    
?>

 
</html>