
<?php
    session_start();
    if(!isset($_SESSION['account'])) {
        // echo "isset-ok";
        header('Location: login.php'); //若無session資料則跳轉到登入頁面
    }
?>

<?php
    require_once 'db.php'; //連接資料庫
    // echo "<br/>帳號： $user_account ,<br/>名字： $user_name ,<br/>Email： $user_email ,<br/>密碼： $user_password ";
?>

<!DOCTYPE html>
<html lang="zh-tw">
    <head>
        <meta charset="utf-8">
        <title>編輯會員資料</title>

    </head>
    <body>
        <h1 class="title">表單練習：編輯會員資料</h1>

        <form class="edit_form" method="post">
            <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
                <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#000000">會員資料</font></td>
                <tr><!--帳號預設不可編輯-->
                    <td width="80" align="center" valign="baseline">帳號</td>
                    <td valign="baseline">
                        <input type="text" name="account" value = "<?=$user_account?>" disabled="true"></td> 
                </tr>
                <tr><!--email-->
                    <td width="80" align="center" valign="baseline">Email</td>
                    <td valign="baseline">
                        <input type="email" name="email" value="<?=$user_email?>" disabled="true"></td>
                </tr>
                <tr><!--名字-->
                    <td width="80" align="center" valign="baseline" >姓名</td>
                    <td valign="baseline">
                        <input type="text" name="name" value="<?=$user_name?>" required></td>
                </tr> 

                <tr><!--密碼1 要寫判斷有輸入資料才修改資料庫.格式要正確-->
                    <td width="80" align="center" valign="baseline">修改密碼</td>
                    <td valign="baseline">
                        <input type="password" name="password" placeholder="修改密碼" minlength="8" /></td>
                </tr>
                <tr><!--密碼2 要寫判斷密碼1跟密碼2是否相同-->
                    <td width="80" align="center" valign="baseline">重複密碼</td>
                    <td valign="baseline">
                        <input type="password" name="password2" placeholder="再輸入一次密碼" minlength="8" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" bgcolor="#CCCCCC">
                    <input type="submit" value="更新"></td>
                </tr>
                
                </div>
                </tr>
            </table>
        </form>
        <p><a href="admin.php" style="color:blue;">返回會員頁面</a></p>
        <p><a href="user_delete.php" style="color:red;">刪除會員資料</a></p>
    </body>

<?php
    require_once 'user_update_check.php';  //判斷表單內容並修改
?>

</html>