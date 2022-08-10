<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>登入頁面</title>
<link rel="stylesheet" type="text/css" href="login.css"/>
<script type="text/javascript" src="login.js"></script>
</head>
<body>
<?php
?>
<div id="login_frame">
<p id="image_logo"><img src="footer-logo.png"></p>
<form method="post" action="login.js">
    
<p><label class="label_input">使用者名稱</label>
    <input type="text" id="username" class="text_field"/></p>

<p><label class="label_input">密碼</label>
    <input type="text" id="password" class="text_field"/></p>

<div id="login_control">
<input type="button" id="btn_login" value="登入" onclick="login();"/> 
<!-- onclick="location.href='function.php'"  -->
<!-- <a id="forget_pwd" href="forget_pwd.html">忘記密碼？<a> -->


</div>
</form>
</div>


</body>
</html>