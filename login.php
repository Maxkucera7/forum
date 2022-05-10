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
                    <div class="col-sm-offset-3 col-sm-6 m-t-15">
                    <button onclick="Login();" type="button" id="btn_register" class="btn btn-success">Register</button>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <div id="message" class="col-sm-offset-3 col-sm-6 m-t-15"></div>
                    </div>
                            
                </form>
    </div>
    <script>
        function Login(){
    console.log('daw');
         
            var email = $('#email').val();
            var password = $('#password').val();
         
                $.ajax({
                    url: 'server/login.php',
                    type: 'post',
                    data:{
                      
                        newemail:email,
                        newpassword:password
                       
                    },
                    success:function(response){
                      // $('#message').html(response);
                        if(response == "ok") {
                    $('#message').html(`<div style="color:green;" class="w3-red w3-panel">Prihlášen</div>`);
					location.href = "index.php";


					//$("#loginContainer messages").html(`<div class="w3-green w3-panel">Přihlášen</div>`);
				} else {
                    $('#message').html(`<div  style="color:red;" class="w3-red w3-panel">${response}</div>`);
				}
                    }
                    
                });
                
            }
        
    </script>
</body>
</html>