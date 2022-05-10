<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php @include('nav.php') ?>
    <div class="container">
    <form id="registraion_form" class="form-horizontal">
					
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-6">
                    <input type="text" id="username" class="form-control" placeholder="enter username" />
                    </div>
                    </div>
                                
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                    <input type="text" id="email" class="form-control" placeholder="enter email" />
                    </div>
                    </div>
                                
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                    <input type="password" id="password" class="form-control" placeholder="enter password" />
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Password repeat</label>
                    <div class="col-sm-6">
                    <input type="password" id="password-repeat" class="form-control" placeholder="enter password" />
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Kontrolní otázka</label>
                    <div class="col-sm-6">
                    <textarea name="answer" id="answer" cols="30" rows="10" placeholder="Napište kontrolní otázku v případě zapomenutí hesla"></textarea>
                    </div>
                    </div>  
                    <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6 m-t-15">
                    <button onclick="Register();" type="button" id="btn_register" class="btn btn-success">Register</button>
                    </div>
                    </div>
                                
                    <div class="form-group">
                        <div id="message" class="col-sm-offset-3 col-sm-6 m-t-15"></div>
                    </div>
                            
                </form>
    </div>
    <script>
        function Register(){
    //console.log('daw');
            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var passwordCheck = $('#password-repeat').val();
            var answer = $('#answer').val();
            console.log(answer);
            if(password !== passwordCheck){
                alert('Hesla nejsou stejné !');
                 
            }else{
                $.ajax({
                    url: 'server/registrace.php',
                    type: 'post',
                    data:{
                        newusername:username,
                        newemail:email,
                        newpassword:password,
                        newanswer:answer
                    },
                    success:function(response){
                        $('#message').html(response);

                    },
                    error:function(response){
                        $('#message').html(response);
                    }
                    
                });
            }
        }
    </script>
</body>
</html>