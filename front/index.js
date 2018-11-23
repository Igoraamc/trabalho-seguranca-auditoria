let login = {
	userLogin : function(form, callback) {
		$.ajax({
			"async" : true,
			"method" : "POST",
			"url" : "../back/login.php",
			"data" : form
		}).done(function(response) {
			callback(response);
		});
	},
	emailVerification : function(email, callback) {
		$.ajax({
			"async" : true,
			"method" : "GET",
			"url": "../back/verificar-email-login.php?email=" + email
		}).done(function(response) {
			callback(response);
		});
	}
}

let register = {
	registerUser : function(form, callback) {
		$.ajax({
			"async" : true,
			"method" : "POST",
			"url" : "../back/register-user.php",
			"data" : form
		}).done(function(response) {
			callback(response);
		});
	},
	emailVerification : function(email, callback) {
		$.ajax({
			"async" : true,
			"method" : "GET",
			"url" : "../back/verificar-email-cadastro.php?email=" + email
		}).done(function(response) {
			callback(response);
		});
	}
}