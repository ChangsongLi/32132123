window.onload = function(){
	// checking user input for account textfield
	var accountTextInput = document.getElementById('account');
	if(accountTextInput){
		accountTextInput.onkeyup = function (e) {
			validateAccount();
		};
	}

	// checking user input for password textfield
	var passwordTextInput = document.getElementById('password');
	if(passwordTextInput){
		passwordTextInput.onkeyup = function (e) {
			validatePassword();
		};
	}

	// checking user input for email textfield
	var emailTextInput = document.getElementById('email');
	if(emailTextInput){
		emailTextInput.onkeyup = function (e) {
			validateEmail();
		};
	}

};

function validateForm() {

	if(!validateAccount() ||
		!validateEmail() ||
		!validatePassword() ||
		!validateBirthday() ||
		!validateGender())
	{
		return false;
	}

	// get all data
	var email = document.getElementById('email').value;
	var gender = 'F';
	if(document.getElementById('gender_male').checked){
		gender = 'M';
	}
	var password = document.getElementById('password').value;
	var account = document.getElementById('account').value;

	var yearSelect = document.getElementById('year');
	var year = yearSelect.options[yearSelect.selectedIndex].text;
	var monthSelect = document.getElementById('month');
	var month = monthSelect.options[monthSelect.selectedIndex].text;
	var daySelect = document.getElementById('day');
	var day = daySelect.options[daySelect.selectedIndex].text;

	var birthday = month+"/"+day+"/"+year;

	$.ajax({
	    url : '../account/create_account.php',
	    type : 'POST',
	    data : {
	        'email'    : email,
			'account'  : account,
			'birthday' : birthday,
			'password' : password,
			'gender'   : gender
	    },
	    dataType:'json',
	    success : function(data) {
			if(data['result']){
				window.location.replace("../index.php");
			}else{

			}
	    }
	});

	// went through check
	return false;
};

function validateEmail(){
	var email = document.getElementById('email').value;
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,15})+$/;
	var errorLabel =  document.getElementById('email_label');
	if(email.match(mailformat)){
		errorLabel.style.visibility = 'hidden';
		return true;
	}else{
		errorLabel.textContent = '请输入有效的邮箱地址。'
		errorLabel.style.visibility = 'visible';
		return false;
	}
};

function validatePassword(){
	var password = document.getElementById('password').value;
	var errorLabel =  document.getElementById('password_label');
	if(password.length >= 8){
		errorLabel.style.visibility = 'hidden';
		return true;
	}else{
		errorLabel.textContent = '最少8个字符。'
		errorLabel.style.visibility = 'visible';
		return false;
	}
};

function validateAccount(){
	var account = document.getElementById('account').value;
	var errorLabel =  document.getElementById('account_label');
	if(account.length >= 2 && account.length <= 12){
		errorLabel.style.visibility = 'hidden';
		return true;
	}else{
		errorLabel.textContent = '2-12字符，注册后不能修改。'
		errorLabel.style.visibility = 'visible';
		return false;
	}
};

function validateBirthday(){
	var yearSelect = document.getElementById('year');
	var year = yearSelect.options[yearSelect.selectedIndex].text;

	var monthSelect = document.getElementById('month');
	var month = monthSelect.options[monthSelect.selectedIndex].text;

	var daySelect = document.getElementById('day');
	var day = daySelect.options[daySelect.selectedIndex].text;

	var date = new Date(year, month - 1, day);
	var errorLabel =  document.getElementById('birthday_label');
	if(date && (date.getMonth() + 1) == month){
		errorLabel.style.visibility = 'hidden';
	}else{
		errorLabel.textContent = '请输入有效的生日日期。'
		errorLabel.style.visibility = 'visible';
	}

	return date && (date.getMonth() + 1) == month;
};

function validateGender(){
	var errorLabel =  document.getElementById('gender_label');
	if(document.getElementById('gender_male').checked || document.getElementById('gender_female').checked){
		errorLabel.style.visibility = 'hidden';
	}else{
		errorLabel.textContent = '请选择您的性别。'
		errorLabel.style.visibility = 'visible';
	}
	return document.getElementById('gender_male').checked || document.getElementById('gender_female').checked;
}
