<?php
    session_start();

    if(!isset($_SESSION["LOGIN"])) {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SafeBox</title>

	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
 
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="index.js"></script>
    <style type="text/css">
        #user_name {
            display: table;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 50px;
        }
        .title {
            display: table;
            margin: 0 auto;
            margin-top: 30px;
            margin-bottom: 60px;
        }
        h4 {
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <div id="add-key" class="modal">
        <div class="modal-content">
            <h4>What key would you like to add?</h4>
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="name" name="name" type="text" class="validate">
                <label for="name">Name</label>
            </div>
            <div class="input-field col s12 mb-60">
                <i class="material-icons prefix">https</i>
                <input id="password" name="password" type="text" class="validate">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="modal-footer">
            <a href="javascript:;" id="yadd-key" class="modal-close waves-effect waves-green btn-flat disabled">Add</a>
        </div>
    </div>
    <div id="remove-key" class="modal">
        <div class="modal-content">
            <h4>What key would you like to remove?</h4>
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="rname" name="rname" type="text" class="validate">
                <label for="rname">Name</label>
            </div>
        </div>
        <div class="modal-footer">
            <a href="javascript:;" id="yremove-key" class="modal-close waves-effect waves-red btn-flat disabled">Remove</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col l4">
                <ul id="slide-out" class="sidenav sidenav-fixed">
                    <li><h5 id="user_name"><?php echo $_SESSION["NAME"]?></h5></li>
                    <li><a href="#add-key" class="modal-trigger">Add Key</a></li>
                    <li><a href="#remove-key" class="modal-trigger">Remove Key</a></li>
                    <li><a href="javascript:;" id="logout">Logout</a></li>
                </ul>
            </div>
            <div class="col l8">
                <h2 class="title">Your Keys</h2>
                <ul class="collapsible popout">
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.collapsible').collapsible();
            $('.modal').modal();
        });

        let allSafeboxKeysCallback = function(response) {
            let data = JSON.parse(response);

            console.log(data.total);

            for (var i = 0; i < data.total; i++) {
                $('<li><div class="collapsible-header"><i class="material-icons">https</i>'+data.data[i].name+'</div><div class="collapsible-body"><span>Password: '+data.data[i].password+'</span></div></li>').appendTo(".collapsible.popout");
            }
        }
        let addSafeboxKeyCallback = function(response) {
            let data = JSON.parse(response);

            if(data.code == 200) {
                $(".collapsible.popout").empty();
                safebox.getAllSafeboxUserKeys(allSafeboxKeysCallback);

                $("#name").val("");
                $("#password").val("");
            }
        }

        let removeSafeboxKeyCallback = function(response) {
            let data = JSON.parse(response);

            if(data.code == 200) {
                $(".collapsible.popout").empty();
                safebox.getAllSafeboxUserKeys(allSafeboxKeysCallback);

                $("#rname").val("");
            }
        }

        let validatingAdd = function() {
            let name = $("#name").val();
            let password = $("#password").val();

            if(name == "") {
                $('#name').addClass('invalid');
                $('#yadd-key').addClass('disabled');
            }else {
                $('#name').removeClass('invalid');
                $('#yadd-key').removeClass('disabled');
            }

            if(password == "") {
                $('#password').addClass('invalid');
                $('#yadd-key').addClass('disabled');
            }else {
                $('#password').removeClass('invalid');
                $('#yadd-key').removeClass('disabled');
            }

            
        };

        let validatingRemove = function() {
            let name = $("#rname").val();

            if(name == "") {
                $('#rname').addClass('invalid');
                $('#yremove-key').addClass('disabled');
            }else {
                $('#rname').removeClass('invalid');
                $('#yremove-key').removeClass('disabled');
            }
            
        };

        safebox.getAllSafeboxUserKeys(allSafeboxKeysCallback);

        $('#yadd-key').on("click", function() {
            if(!$('#add-key').find('.invalid').length != 0) {
                let name = $("#name").val();
                let password = $("#password").val();

                let object = {
                    "key_name": name,
                    "key_password": password
                };

                safebox.addSafeboxKey(object, addSafeboxKeyCallback);
            }
        });

        $('#yremove-key').on("click", function() {
            if(!$('#add-key').find('.invalid').length != 0) {
                let name = $("#rname").val();

                safebox.removeSafeboxKey(name, removeSafeboxKeyCallback);
            }
        });

        $("#name").on("keyup", validatingAdd);
        $("#password").on("keyup", validatingAdd);
        $("#rname").on("keyup", validatingRemove);


        $("#logout").on('click', function() {
            window.location.href = "login.php";
        });

        
    </script>
</body>
</html>