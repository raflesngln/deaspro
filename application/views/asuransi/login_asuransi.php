<style>
body{background-color:#2D2D2D}
.login-admin{
	width:40%;
	height:55%;
	background-color:#FFF;
	outline:20px #CCC solid;
	margin:2px auto;
	margin-top:5%;
}
.login-admin input[type=text], .login-admin input[type=password]{
	height:35px;
	width:97%;
	border:1px #999 solid;
	padding-left:10px;
	margin-bottom:5px;
	border-radius:3px;
}
.login-admin input[type=text]:focus, .login-admin input[type=password]:focus{
	border:2px #0CC solid;
	box-shadow:1px 1px 3px #6CC;
}
.login-admin input[type=submit]{
	height:40px;
	width:50%;
	color:#333;
	font-size:large;
	border-radius:2px;
	border:none;
	background-color:#00974B;
	color:#FFF;
	transition:all 1s;
}
.login-admin input[type=submit]:hover{
	background-color:#00EA75;
	border:1px #FFF solid;
	color:#FFF;
	cursor:pointer;
}
#level{width:90%; height:30px}
</style>


<div class="login-admin">
<?php echo form_open('asuransi/cek_login');?>

<table border="0" cellpadding="0" cellspacing="0" width="97%" style="border-radius:20px">

<tr>
  <th height="36" colspan="3"><div align="center">
    <h1><font color="#FF0000">DEASCOM</font></h1></div></th>
</tr>
<tr>
  <th height="35" colspan="3">Login Asuransi 
  </tr>
<tr>
  <th height="27" colspan="3">&nbsp;</th>
  </tr>
<tr>

<th height="27">Username</th>
<td>:</td>

<td><input type="text" placeholder="Username" required="required" name="username"  /></td>

</tr>

<tr>
  <th height="30">Password</th>
  <td>&nbsp;</td>
  <td><input type="password" placeholder="Password" required="required" name="password" class="login-inp" /></td>
</tr>
<tr>
  <th height="30" colspan="3">&nbsp;</th>
</tr>
<tr>
  <th height="53" colspan="3"><input type="submit" value="Masuk"  /></th>
</tr>
<tr>
  <th height="32" colspan="3"><?php echo isset($message)?$message:'';?></th>
</tr>
<tr>
  <th height="32" colspan="3"><blink><font color="#FF0000"></font></blink></th>
  </tr>
</table>

 <?php echo form_close();?>

</div>

