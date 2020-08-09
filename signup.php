<?php
require('function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「　ユーザー登録ページ　');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();

if(!empty($_POST)){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_re = $_POST['pass_re'];

    validRequired($email,'email');
    validRequired($pass,'pass');
    validRequired($pass_re,'pass_re');

    if(!empty($_POST)){
        validEmail($email,'email');
        validMaxLen($email,'email');
        validMinLen($email,'email');
        validEmailDup($email);

        validHalf($pass,'pass');
        validMaxLen($pass,'pass');
        validMinLen($pass,'pass');
        validMatch($pass, $pass_re, 'pass_re');

        if(empty($err_msg)){
            try{
                $dbh = dbConnect();
                $sql = 'INSERT INTO users (email,password,login_time,create_date) VALUES(:email,:pass,:login_time,:create_date)';
          $data = array(':email' => $email, ':pass' => password_hash($pass, PASSWORD_DEFAULT),
                        ':login_time' => date('Y-m-d H:i:s'),
                        ':create_date' => date('Y-m-d H:i:s'));
          // クエリ実行
          $stmt = queryPost($dbh, $sql, $data);
          

          if($stmt){
              $sesLimit = 60*60;
              $_SESSION['login_date'] = time();
              $_SESSION['login_limit'] = $sesLimit;

              $_SESSION['user_id'] = $dbh->lastInsetId();
              debug('セッション変数の中身：'.print_r($_SESSION,true));
              header("Location:index.php");
          }
            }catch (Exception $e){
                error_log('エラー発生：'.$e->getMessage());
                $err_msg['common'] = MSG07;
            }
        }
    }
}
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
        <span class="area-msg" style="color:red;"><?php if(!empty($err_msg['email'])) echo $err_msg['email']; ?></span>
            <input type="text" name="email" placeholder="メールアドレス" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>">
        <!-- 未記入あり -->
        <span class="area-msg" style="color:red;"><?php if(!empty($err_msg['pass'])) echo $err_msg['pass']; ?></span>
            <input type="password" name="pass" placeholder="パスワード" value="<?php if(!empty($_POST['pass'])) echo $_POST['pass'];?>">
        <span class="area_msg" style="color:red;"><?php if(!empty($err_msg['pass_re'])) echo $err_msg['pass_re']; ?></span>
             <input type="password" name="pass_re" placeholder="パスワード(再入力)" value="<?php if(!empty($_POST['pass_re'])) echo $_POST['pass_re'];?>">
            <div class="btn-container">
              <input type="submit" class="btn btn-mid" value="登録">
            </div>
            <a href="passRemindSend.php">パスワードを忘れた方はコチラ</a>
    </form>
    </section>
<?php
require('footer.php');
?>