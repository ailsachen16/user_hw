<?php
    session_start();
    if(!isset($_SESSION['account'])) {
        // echo "isset-ok";
        header('Location: login.php'); //若無session資料則跳轉到登入頁面
    }
?>
<?php
    require_once 'db.php'; //連接資料庫
    echo "<br/>帳號： $user_account ,<br/>名字： $user_name ,<br/>Email： $user_email ,<br/>密碼： $user_password ";
?>

<form class="edit_form" method="post">
    <p style="color:red;">確定要刪除資料嗎？</p>
    <input type="submit" value="確定">
</form>

<p><a href="admin.php">返回會員頁面</a></p>

<?php
    require_once 'user_delete_go.php';
?>