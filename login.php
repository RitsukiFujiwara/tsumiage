<?php
require('function.php');

debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「　ログインページ　');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();

require('auth.php');

if(!empty($_POST)){
  debug('(ログイン)POST送信があります');

  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $pass_save = (!empty($_POST['pass_save'])) ? true : false;

  validEmail($email,'email');
  validMaxLen($email,'email');
  validHalf($pass,'pass');
  validMaxLen($pass,'pass');
  validMinLen($pass,'pass');

  validRequired($email,'email');
  validRequired($pass,'pass');

  if(empty($err_msg)){
    debug('エラー無し');

    try{
      $dbh = dbConnect();
      $sql = 'SELECT password,id FROM users WHERE email = :email AND delete_flg = 0';
      $data = array(':email' => $email);
      $stmt = queryPost($dbh,$sql,$data);
      $result = $stmt->fetch(PDO::FECTH_ASSOC);
      debug('(ログイン)クエリ結果の中身:'.print_r($result,true));

      if(!empty($result) && password_verify($pass,array_shift($result))){
        debug('(ログイン)パスワードがマッチしました');

        $sesLimit = 60*60;
        $_SESSION['login_date'] = time();

        if($pass_save){
          debug('ログイン保持にチェックあり');
          $_SESSION['login_limit'] = $sesLimit * 24 * 30;
        }else{
          debug('ログイン保持にはチェック無し');
          $_SESSION['login_limit'] = $sesLimit;
        }

        $_SESSION['user_id'] = $result['id'];
        debug('セッション変数の中身:'.print_r($_SESSION,true));
        debug('マイページへ遷移');
        header("mypage.php");
      }else{
        debug('パスワードが異なります');
        $err_msg['common'] = MSG09;
      }
    }catch (Exception $e){
      error_log('エラー発生:'.$e->getMessage());
      $err_msg['common'] = MSG07;
    }
  }
}
debug('画面表示処理終了 <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<');

?>

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
        <div class="area-msg">
             <?php 
              if(!empty($err_msg['common'])) echo $err_msg['common'];
             ?>
           </div>
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