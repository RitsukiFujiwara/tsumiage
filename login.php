<?php
$siteTitle = "ログイン";
require('head.php');
?>
<?php
require('header.php');
?>

<body class="signin">
    <section class="form-container">
    <form action="" method="post">
        <h2 class="title">ログイン</h2>
        <!-- 未記入あり -->
        <span class="area-msg" style="color:red;"><?php if(!empty($err_msg['email'])) echo $err_msg['email']; ?></span>
        <input type="text" name="email" placeholder="メールアドレス" value="">
        <!-- 未記入あり -->
        <span class="area-msg" style="color:red;"><?php if(!empty($err_msg['pass'])) echo $err_msg['pass']; ?></span>
            <input type="password" name="pass" placeholder="パスワード" value="">
        <label>
             <input type="checkbox" name="pass_save">次回以降のログイン省略
           </label>
            <div class="btn-container">
              <input type="submit" class="btn btn-mid" value="ログイン">
            </div>
            <a href="passRemindSend.php">パスワードを忘れた方はコチラ</a>
    </form>
    </section>
<?php
require('footer.php');
?>