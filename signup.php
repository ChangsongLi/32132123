<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>美国防骗网</title>
	<link rel="stylesheet" type="text/css" href="style/basicStyle.css">
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="scripts/signup.js"></script>
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
										<label for="email_login">邮箱</label>
									</td>
									<td class="login_title">
										<label for="pass_login">密码</label>
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
					<li><a href="index.php">首页</a></li>
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
		<div class="wrap space50 width_form margin_center">
			<div class="left">
				<h2 class="mbs _3ma _6n _6s _6v" style="font-size: 36px">注册新帐号</h2>
				<div class="mbl _3m9 _6o _6s _mf">免费国外生活交流。</div>
				<div>
					<form method="post" id="reg" name="reg" onsubmit="return validateForm();">
						<div>
							<input type="text" class="name_input margin_top8 width320" data-type="text"
								id="account" aria-required="1" placeholder="昵称" aria-label="account">
							<span id="account_label" class="error_label hidden">-0-</span>
						</div>
						<div>
							<input type="text" class="name_input margin_top8 width320" data-type="text"
								id="email" aria-required="1" placeholder="邮箱" aria-label="Email">
							<span id="email_label" class="error_label hidden">-0-</span>
						</div>
						<div>
							<input type="password" class="name_input margin_top8 width320" name="password"
								id="password" aria-required="1" placeholder="新密码" aria-label="Password">
							<span id="password_label" class="error_label hidden">-0-</span>
						</div>
						<div>
							<div class="margin_top22">生日</div>
							<div class="margin_top8">
								<select aria-label="Year" name="birthday_year" id="year" title="Year" class="bday">
									<option value="0" selected="1">年</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option>
									<option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option>
									<option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option>
									<option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option>
									<option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option>
									<option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option>
									<option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option>
									<option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option>
									<option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option>
									<option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option>
									<option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option>
									<option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option>
									<option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option>
									<option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option>
									<option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option>
									<option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option>
									<option value="1906">1906</option><option value="1905">1905</option>
								</select>
								<select aria-label="Month" name="birthday_month" id="month" title="Month" class="bday">
									<option value="0" selected="1">月</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option>
									<option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option>
									<option value="9">9</option> <option value="10">10</option> <option value="11">11</option><option value="12">12</option>
								</select>
								<select aria-label="Day" name="birthday_day" id="day" title="Day" class="bday margin_right20">
									<option value="0" selected="1">日</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option>
									<option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
									<option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option>
									<option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option>
									<option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
								</select>
								<span id="birthday_label" class="error_label hidden">-0-</span>
							</div>
						</div>
						<div class="margin_top22">
							<span>
								<span class="margin_right20">
									<input type="radio" name="sex" id="gender_male">
									<label class="gender_label" for="gender_input">男士</label>
								</span>
								<span class="margin_right20">
									<input type="radio" name="sex" id="gender_female">
									<label class="gender_label" for="gender_input">女士</label>
								</span>
							</span>
							<span id="gender_label" class="error_label hidden">-0-</span>
						</div>
						<div class="margin_top22">
							<p class="term">By clicking Create Account, you agree to our <a href="/legal/terms" id="terms-link" target="_blank" rel="nofollow">Terms</a> and that you have read our <a href="/about/privacy" id="privacy-link" target="_blank" rel="nofollow">Data Policy</a>, including our <a href="/policies/cookies/" id="cookie-use-link" target="_blank" rel="nofollow">Cookie Use</a>. </p>
						</div>
						<div class="margin_top22">
							<button type="submit" class="green_button" name="websubmit">注册</button>
						</div>

					</form>
				</div>
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
