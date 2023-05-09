<?php

    $connection = mysqli_connect("localhost:****","***","***","***");
    if (mysqli_connect_error()){
    echo "資料庫連接失敗";
    }
    // else{
    // echo "已連接資料庫";
    // }
    $query = "SELECT * FROM `user`";
    $sql_login = "SELECT `account`, `password`, `name` FROM `user` ";
    
    if($result = mysqli_query($connection, $query)){
        while ($row = mysqli_fetch_array($result)){
            $account_row[] = $row['account']; //把account加入這個變數
            $email_row[] = $row['email']; //用來儲存email資訊
            $password_row[] = $row['password']; //用來儲存password資訊
            $name_row[] = $row['name']; //用來儲存name資訊
        }
    }
    
    $user_account = $_SESSION['account'];
    $key_search = array_search($user_account,$account_row);
    $user_name =  $name_row[$key_search];
    $user_email =  $email_row[$key_search];
    $user_password = $password_row[$key_search];
    
    
    
?>