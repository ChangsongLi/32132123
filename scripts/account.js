function logout(){
	$.ajax({
	    url : '../account/logout.php',
	    type : 'POST',
	    data : {
	    },
	    dataType:'json',
	    success : function(data) {
			window.location.replace(window.location);
	    }
	});
	return true;
};

function login(){
	var email = document.getElementById('email_login').value;
	var password = document.getElementById('password_login').value;
	$.ajax({
	    url : '../account/login.php',
	    type : 'POST',
	    data : {
			'email'    : email,
			'password' : password
	    },
	    dataType:'json',
	    success : function(data) {
			if(data['result']){
				window.location.replace(window.location);
			}else{
				// wrong email or password
				var errorLabel = document.getElementById('loginError');
            	errorLabel.innerHTML = "邮箱或密码错误！";
			}
	    }
	});
	return false;
}

function resetPassword(){
	if(!validateEmail()){
		return false;
	}
	var email = document.getElementById('email').value;
	$.ajax({
	    url : '../account/reset_password.php',
	    type : 'POST',
	    data : {
			'email'    : email
	    },
	    dataType:'json',
	    success : function(data) {
			if(data['result']){
			}else{

			}
	    }
	});
	return false;
}

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
