<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>

	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
 
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="index.js"></script>
            
    <style type="text/css">
	    body {
	    	font-family: 'Montserrat', sans-serif;
	    }
    	#login-cadastro h1 {
    		text-align: center;
    		margin-bottom: 120px;
    	}
    	#login-cadastro .border-change {
    		border-right: 1px solid #dadada;
    	}
    	#login-cadastro .fields .btn {
    		margin: 0 auto;
    		display: table;
    		width: 30%;
    	}
    	.mb-60 {
    		margin-bottom: 60px;
    	}
    </style>
</head>
<body>
	<div id="register-modal" class="modal">
	    <div class="modal-content">
	      	<h4></h4>
	      	<p></p>
	    </div>
	    <div class="modal-footer">
	      	<a href="#!" class="modal-close waves-effect waves-green btn-flat"></a>
	    </div>
  	</div>
	<div class="container">
		<div class="row">
			<div id="login-cadastro">
				<h1>Password SafeBox</h1>
				<div class="col l6 s12 border-change">
					<div class="fields">
						<form id="login">
							<div class="input-field col s12">
								<i class="material-icons prefix">account_circle</i>
					          	<input id="lemail" name="lemail" type="email" class="validate">
					          	<label for="lemail">Email</label>
					        </div>
					        <div class="input-field col s12 mb-60">
					        	<i class="material-icons prefix">https</i>
					          	<input id="lpassword" name="lpassword" type="password" class="validate">
					          	<label for="lpassword">Password</label>
					        </div>
					        <button id="login-btn" class="waves-effect waves-light btn">Login</button>
						</form>
					</div>
				</div>
				<div class="col l6 s12">
					<div class="fields">
						<form id="register">
							<div class="input-field col s12">
								<i class="material-icons prefix">account_circle</i>
					          	<input id="name" name="name" type="text" class="validate">
					          	<label for="name">Your name</label>
					          	<span class="helper-text" data-error="Campo Inválido"></span>
					        </div>
					        <div class="input-field col s12">
								<i class="material-icons prefix">email</i>
					          	<input id="cemail" name="cemail" type="email" class="validate">
					          	<label for="cemail">Email</label>
					          	<span class="helper-text"></span>
					        </div>
					        <div class="input-field col s12">
								<i class="material-icons prefix">https</i>
					          	<input id="cpassword" name="cpassword" type="password" class="validate">
					          	<label for="cpassword">Password</label>
					          	<span class="helper-text" data-error="Campo Inválido"></span>
					        </div>
					        <div class="input-field col s12 mb-60">
								<i class="material-icons prefix">https</i>
					          	<input id="cconfirmpassword" name="cconfirmpassword" type="password" class="validate">
					          	<label for="cconfirmpassword">Password Confirm</label>
					          	<span class="helper-text" data-error="Campo Inválido"></span>
					        </div>
					        <button id="register-btn" type="submite" class="waves-effect waves-light btn">Register</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
		    $('.modal').modal();
		  });

		$('#register-modal').hide();
		let codeEmailValid;
		let isEmailValid = false;
		let callbackRegisterUser = function(response) {
			let data = JSON.parse(response);

			if(data.code == 200) {
				$('#lemail').val($('#cemail').val());
				$('#lpassword').val($('#cpassword').val());

				$("#login-btn").click();
			}
		}
		let callbackUserLogin = function(response) {
			let data = JSON.parse(response);

			if(data.code == 200) {
				window.location.href = "safebox.php";
			}
			console.log(data);
		}
		let callbackEmailVerification = function(response) {
			codeEmailValid = response;

			if(codeEmailValid.code == 0) {
				isEmailValid = false;
			}else {
				isEmailValid = true;
			}
		}
		$('form#register').on('submit', function(e) {
			e.preventDefault();
			let registerUsername = $('#name').val();
			let registerEmail = $('#cemail').val();
			let registerPassword = $('#cpassword').val();
			let registerPasswordConfirmation = $('#cconfirmpassword').val();
			register.emailVerification($('#cemail').val(), callbackEmailVerification);

			if(registerUsername == "") {
				$('#name').addClass('invalid');
			}else {
				$('#name').removeClass('invalid');
			}

			if(registerEmail == "") {
				$('#cemail').addClass('invalid');
				$('#cemail').parent().find('.helper-text').attr('data-error', 'Campo Inválido');
			}else if(!isEmailValid){
				$('#cemail').addClass('invalid');
				$('#cemail').parent().find('.helper-text').attr('data-error', 'Email já cadastrado');
			}else {
				$('#cemail').removeClass('invalid');
			}

			if(registerPassword == "") {
				$('#cpassword').addClass('invalid');
				$('#cpassword').parent().find('.helper-text').attr('data-error', 'Campo Inválido');
			}else {
				$('#cpassword').removeClass('invalid');
			}

			if(registerPasswordConfirmation == "") {
				$('#cconfirmpassword').addClass('invalid');
				$('#cconfirmpassword').parent().find('.helper-text').attr('data-error', 'Campo Inválido');
			}else {
				$('#cconfirmpassword').removeClass('invalid');
			}
			if(registerPassword != "" && registerPasswordConfirmation != "") {
				if(registerPassword != registerPasswordConfirmation) {
					$('#cpassword').addClass('invalid');
					$('#cpassword').parent().find('.helper-text').attr('data-error', 'Senhas não são iguais');
					$('#cconfirmpassword').addClass('invalid');
					$('#cconfirmpassword').parent().find('.helper-text').attr('data-error', 'Senhas não são iguais');
				}else {
					$('#cpassword').removeClass('invalid');
					$('#cconfirmpassword').removeClass('invalid');
				}
			}

			if($('form#register').find('.invalid').length != 0) {
				return false;
			}

			let form = $("form#register").serialize();

			register.registerUser(form, callbackRegisterUser);

			return false;
		});

		$('#cemail').on('blur', function() {
			register.emailVerification($('#cemail').val(), callbackEmailVerification);
		});

		$('form#login').on('submit', function(e) {
			e.preventDefault();
			let loginEmail = $('#lemail').val();
			let loginPassword = $('#lpassword').val();

			if(loginEmail == "") {
				$('#lemail').addClass('invalid');
				$('#cemail').parent().find('.helper-text').attr('data-error', 'Campo Inválido');
			}else {
				$('#lemail').removeClass('invalid');
			}

			if(loginPassword == "") {
				$('#lpassword').addClass('invalid');
				$('#lpassword').parent().find('.helper-text').attr('data-error', 'Campo Inválido');
			}else {
				$('#lpassword').removeClass('invalid');
			}

			if($('form#login').find('.invalid').length != 0) {
				return false;
			}

			let form = $("form#login").serialize();

			login.userLogin(form, callbackUserLogin);

			return false;
		});
	</script>
</body>
</html>