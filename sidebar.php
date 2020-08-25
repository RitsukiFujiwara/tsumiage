<?php
$dbFormData = getUser($_SESSION['user_id']);
?>
<style>
.prev-img1{
  height: 100px;
  width:100px;
  margin-left: 15px;
  border-radius: 40%;
}
.userinfo{
  position: absolute;
  top: 220px;
  background: rgb(196, 181, 95);
  padding: 10px 65px 13px 65px;
}
.userinfo h2{
  width: 100px;
  text-align: center;
  margin-bottom: 30px;
  background: black;
  color: rgb(196, 181, 95);
  padding: 10px;
  font-size: 12px;
}
.userinfo p{
  text-align: center;
  
}

</style>
<section id="sidebar">
  <a href="registProduct.php"><i class="far fa-arrow-alt-circle-down"></i>  合トレ情報の登録</a>
  <a href="tranSale.php"><i class="far fa-handshake"></i>  合トレ履歴</a>
  <a href="profEdit.php"><i class="fas fa-id-card"></i>  プロフィールを編集</a>
  <a href="passEdit.php"><i class="fas fa-key"></i>  パスワード変更</a>
  <a href="withdraw.php"><i class="fas fa-sign-out-alt"></i> 退会</a>
  <div class="userinfo">
    <h2>ユーザー情報</h2>
    <p><?php echo getFormData('username')?></p>
    <img src="<?php echo getFormData('pic'); ?>" alt="" class="prev-img1">
  </div>
</section>