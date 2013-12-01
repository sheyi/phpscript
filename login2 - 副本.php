<?php
require(SHEYIROOT_PATH . '/a/cmd/common/head.php');
?>

<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
   <div class="container">

      <form class="form-signin" action="/a/cnf/cmdlogin.php" method="post">
        <h2 class="form-signin-heading">请登陆</h2>

<div class="alert alert-info">
<i class="icon-info-sign"></i>选择用户名、输入密码和验证码。
</div>

       
<select  class="form-control" name="username" required> 
<option value="0">请选择用户名</option>
<option value="姚文军" >姚文军</option>
<option value="黄新亮" >黄新亮</option>
<option value="陈清军" >陈清军</option> 
<option value="杜敬平" >杜敬平</option> 
<option value="袁志利" >袁志利</option>
<option value="柴振同" >柴振同</option>
<option value="陈美琼" >陈美琼</option> 
<option value="杨一凌" >杨一凌</option> 
<option value="王林丛" >王林丛</option> 
<option value="程玲" >程玲</option> 
<!--option value="刘密" >刘密</option---> 
<option value="佘义" >佘义</option> 
</select>
<input type="password" class="form-control" placeholder="密码" name="userpass" required>
<div class="input-group">
  <input type="text" class="form-control" name="sheyicode" placeholder="请输入验证码" required>
  <span class="input-group-addon"><img src=/a/lib/img2.php onclick="this.src='/a/lib/img2.php?nocache='+Math.random()" style="cursor:hand"/>
</span>
</div>
		<input type="hidden" name="userhidden" value="0" />
		<input type="hidden" name="userrem" value="y" />		
		<button class="btn btn-lg btn-primary btn-block" type="submit">登陆！</button>
      </form>

    </div> <!-- /container -->




<?php
require(SHEYIROOT_PATH . '/a/cmd/common/foot.php');
?>
