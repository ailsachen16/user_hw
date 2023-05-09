<!--form01.php
-->


<!DOCTYPE html>
<html lang="zh-tw">
    <head>
        <meta charset="utf-8">
        <title>表單練習</title>
    </head>
    <body>
        



        <h1 class="title">表單練習：註冊會員</h1>
        <form method="post">
            <div class="user_form">
                <p>帳號：</p>
                <p><input type="text" name="account" placeholder="輸入英文或數字組成的帳號" minlength="3" required /></p>
                <p>密碼：</p>
                <p><input type="password" name="password" placeholder="請輸入8個字以上並且含有字母和數字" minlength="8"  required /></p>
                <p>確認密碼：</p>
                <p><input type="password" name="password2" placeholder="再輸入一次密碼" minlength="8" required /></p>
                <p>姓名：</p>
                <p><input type="text" name="name" placeholder="輸入您的姓名" minlength="2" required /></p>
                <p>Email：</p>
                <p><input type="email" name="email" placeholder="輸入您的信箱" required /></p>
                <p><input type="submit" value="送出資料" /></p>
            </div>
        </form>
    </body>


            

        <?php //資料庫連接
            require_once 'db.php'; //連接資料庫

            
            
            if($result = mysqli_query($connection, $query)){
                // echo "找到user資料表";
                $account_row = []; //用來儲存account:帳號資訊
                $email_row = []; //用來儲存email資訊
                while ($row = mysqli_fetch_array($result)){
                    // echo $row['email']."<br/>"; //email們
                    // echo $row['account']."<br/>"; //帳號們
                    $account_row[] = $row['account']; //把account加入這個變數
                    $email_row[] = $row['email'];
                }
                

                
            }else{
                echo "找不到資料表";
            }
            
            



        ?>



        <?php //判斷表單 用 return; 來避免繼續執行錯誤內容

            $password1 = ($_POST["password"]);
            $password2 = ($_POST["password2"]);
            // $password_str=(strlen($_POST["password"]));

            // 確認是否有表單提交的動作，只會在表單提交之後繼續執行
            if ($_SERVER["REQUEST_METHOD"] !== "POST") { 
                return;
            }
             
                
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
            
            // 判斷帳號是否符合條件 (只能英文or數字)
            if (!preg_match('/^[a-zA-Z0-9]+[a-zA-Z0-9]$/', ($_POST["account"]))) {
                echo "帳號不能包含特殊字元！";
                return;
            }
            
            // 判斷email格式是否正確
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                echo "EMAIL NG";
                return;
            }
            


            // 判斷email是否有申請過 2           
            $re_email = 1;
            foreach ($email_row as $mail_row){ 
                if (($_POST["email"]) == $mail_row){
                    echo "這個email已經註冊過！";
                    $re_email ++; //如果有人用過就+1
                }
            }           

            // 判斷帳號是否有申請過
            $re_acc = 1;
            foreach ($account_row as $acc_row){ 
                if (($_POST["account"]) == $acc_row){
                    echo "已有人使用這個帳號！";
                    $re_acc ++; //如果有人用過就+1
                }
            }

            // 當帳號沒有人使用過($re_acc = 1) 而且
            // 當mail沒有人使用過($re_email = 1)
            if (($re_acc == 1) AND ($re_email == 1)){ 
                echo "<br/>您已完成註冊！三秒後為您跳轉至登入頁面~<br/>"; 
                
                // 這些資料會存到資料庫
                echo "<br/>你輸入的資料是<br/>姓名：".($_POST["name"])."<br/>帳號：".($_POST["account"])."<br/>密碼：".($_POST["password"])."<br/>信箱：".($_POST["email"]) ; 
                
                // 用來新增資料表內容
                $query_add = "INSERT INTO user(account,password,name,email) VALUES('{$_POST["account"]}','{$_POST["password"]}','{$_POST["name"]}','{$_POST["email"]}')"; 
                $result_add = mysqli_query($connection, $query_add);
                
                // 用JavaScript跳轉登入頁面
                echo "<script>setTimeout(function(){window.location.href='login.php';},3000);</script>";
                }

        ?>        

</html>