<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>美国防骗网</title>
	<link rel="stylesheet" type="text/css" href="style/basicStyle.css">
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="scripts/account.js"></script>
  </head>
  <body>
  	<div id="header">
		<div class="wrap">
			<div id="web_name">
				美国防骗网
			</div>
			<div id="log_in">
				<?php
				session_start();
				if(!isset($_SESSION["email"])){
					echo '<form id="login_form" method="post" onsubmit="return login();" novalidate="1">
						<table cellspacing="0" role="presentation">
							<tbody>
								<tr>
									<td class="login_title">
										<label for="email">邮箱</label>
									</td>
									<td class="login_title">
										<label for="pass">密码</label>
									</td>
								</tr>
								<tr>
									<td>
										<input id="email_login" type="email" class="inputtext" name="email" value="" tabindex="1">
									</td>
									<td>
										<input id="password_login" type="password" class="inputtext" name="pass" tabindex="2">
									</td>
									<td>
										<label class="button" id="loginbutton" for="u_0_q">
											<input value="登录" tabindex="4" type="submit">
										</label>
									</td>
								</tr>
								<tr>
									<td id="loginError"class="login_form_label_field login-error">
									</td>
									<td class="login_form_label_field">
										<div>
											<a class="link" href="signup.php">注册新账号</a>
											<a class="link" href="password.php">忘记密码?</a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</form>';
				}else{
					echo '<div class="">
							  <div>
							       <div class="margin_right20 login_title inline-block">你好，';
					echo                $_SESSION["account"];
					echo           '</div>';
					echo	 	   '<form class="inline-block"method="post" onsubmit="return logout();">
								  		  <label class="button" id="loginbutton" for="u_0_q">
											  <input value="登出" tabindex="3" type="submit">
										  </label>
									</form>
						      </div>
					     </div>';
				}
				?>
			</div>
			<div class="navigation">
				<ul>
					<li><a class="selected_anchor" href="index.php">首页</a></li>
					<li><a href="#">留学</a></li>
					<li><a href="#">汽车</a></li>
					<li><a href="#">工作</a></li>
					<li><a href="#">旅行</a></li>
					<li><a href="#">租房</a></li>
					<li><a href="#">恋爱</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="min_width">
		<div class="wrap space50 width_form margin_center height400">
			<div class="space50">
				<?php
				// check email exists
				$email = strtolower($_GET['e']);
				$hash = $_GET['p'];

				$connection = new mysqli("localhost", "root", "909185", "AmericanFraud");
				if (mysqli_connect_errno($connection)) {
					echo "<div>";
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
					echo "</div>";
				}

				$stmt = $connection->prepare("SELECT resetDate FROM Users WHERE email = ? AND hash = ?;");
				$stmt->bind_param('ss', $email, $hash);
				$stmt->execute();

				// get result from query
				$result = $stmt->get_result();

				$return = array('result' => false);

				if($result->num_rows > 0){
					// get only rwo returned
					$row = $result->fetch_assoc();
					$return = array('result' => true);
					$resetDate = strtotime($row['resetDate']);
					$today = strtotime(date('Y-m-d H:i:s'));

					if($today - $resetDate > 60 * 60 * 24){
						echo "<h2>错误</h2>";
						echo "对不起，您的链接已经过期。";
						echo "<div>如何有任何问题，请联系: changsongliqd@gmail.com</div>";
					}else{
						
					}

					$stmt->close();
				}else{
					echo "<h2>错误</h2>";
					echo "对不起，您的链接已经过期。";
					echo "<div>如何有任何问题，请联系: changsongliqd@gmail.com</div>";
				}
				?>
			</div>
		</div>
	</div>
	<div class="min_width footer">
		<div class="wrap">
			<div class="center">
				 © Copyright 2017-2018 ChineseInLA.com All rights reserved.
			</div>
		</div>
	</div>
  </body>
</html>
