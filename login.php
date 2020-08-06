<?php
require('head.php');
$siteTitle = "ログイン";
?>
<?php
require('header.php');
?>

<body>
    <section class="form-container">
    <form action="" method="post">
        <h2 class="title">ログイン</h2>
        <!-- 未記入あり -->
        <div class="area-msg">
        </div>
        <label class="">
            <input type="text" name="email" placeholder="メールアドレス" value="">
        </label>
        <!-- 未記入あり -->
        <div class="area-msg">
        </div>
        <label class="">
            <input type="password" name="pass" placeholder="パスワード" value="">
        </label>

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