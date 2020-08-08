<?php

?>

<?php
$siteTitle = "新規登録";
require('head.php');
?>
<?php
require('header.php');
?>

<body class="signup">
    <section class="form-container">
    <form action="" method="post">
        <h2 class="title">新規登録</h2>
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
             <input type="password" name="pass_re" placeholder="パスワード(再入力)">
           </label>
            <div class="btn-container">
              <input type="submit" class="btn btn-mid" value="登録">
            </div>
            <a href="passRemindSend.php">パスワードを忘れた方はコチラ</a>
    </form>
    </section>
<?php
require('footer.php');
?>