<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tsumiアゲ</title>
</head>
<body>
    <header>
        <div id="site-width">
        <h1><a href="index.php">Tsumiアゲ</a></h1>
        <nav id="top-nav">
            <ul>
            <?php
                if(empty($_SESSION['user_id'])){
            ?>
                <li><a href="signup.php">新規登録</a></li>
            <?php
                }else{
            ?>
            <li><a href="#">マイページ</a></li>
            <li><a href="#">ログアウト</a></li>
            <?php
                }
            ?>
            </ul>
        </nav>
        </div>
    </header>
    <footer id="footer">
      Copyright <a href="#">Tsumiアゲサポートセンター</a>. All Rights Reserved.
    </footer>
    
    <script src="js/vendor/jquery-2.2.2.min.js"></script>
    <script>
      $(function(){
        var $ftr = $('#footer');
        if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
          $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) +'px;' });
        }
      });
    </script>
  </body>
</html>
