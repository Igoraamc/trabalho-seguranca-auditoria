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

let safebox = {
	getAllSafeboxUserKeys : function(callback) {
		$.ajax({
			"async" : true,
			"method" : "GET",
			"url" : "../back/get-all-safebox-keys.php"
		}).done(function(response) {
			callback(response);
		});
	},
	addSafeboxKey : function(object, callback) {
		$.ajax({
			"async" : true,
			"method" : "GET",
			"url" : "../back/set-safebox-key.php?key_name="+object.key_name+"&key_password="+object.key_password
		}).done(function(response) {
			callback(response);
		});
	},
	removeSafeboxKey : function(name, callback) {
		$.ajax({
			"async" : true,
			"method" : "GET",
			"url" : "../back/remove-safebox-key.php?key_name="+name
		}).done(function(response) {
			callback(response);
		});
	}
}



