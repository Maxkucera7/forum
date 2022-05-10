<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php 
        @include('nav.php')   

    ?>
    
    <div class="container">
    <form id="registraion_form" class="form-horizontal">
					
                   
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Nadpis</label>
                    <div class="col-sm-6">
                    <input type="text" id="nadpis" class="form-control" placeholder="enter email" />
                    </div>
                    </div>
                                
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                    <textarea name="text" id="text" cols="30" rows="10"></textarea>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6 m-t-15">
                    <button onclick="Create();" type="button" id="btn_register" class="btn btn-success">Vytvořit recept</button>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <div id="message" class="col-sm-offset-3 col-sm-6 m-t-15"></div>
                    </div>
                            
                </form>
    </div>
    <script>
        function Create(){
            var nadpis = $('#nadpis').val();
            var text = $('#text').val();

            $.ajax({
                    url: 'server/create.php',
                    type: 'post',
                    data:{
                      
                        newnadpis:nadpis,
                        newtext:text
                       
                    },
                    success:function(response){
                      // $('#message').html(response);
                        if(response == "ok") {
                    $('#message').html(`<div style="color:green;" class="w3-red w3-panel">Příspěvěk vytvořen !</div>`);
					//location.href = "index.php";


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