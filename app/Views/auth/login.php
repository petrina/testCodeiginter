<html>
    <head>
        <style>
            body {
                color: #0066ff;
                font-family: Helvetica;
            }
            .pagename {
                text-align: center;
                padding: 40px 0;
                font-size: 24px;
                font-weight: bold;
            }
            .block_form {
                width:100%;
                text-align: center;
            }
            .block_form_content {
                width: 40%;
                text-align: left;
                left: 50%;
                position: absolute;
                margin-left: -20%;
            }
            .form_row {
                width:100%;
                margin: 10px 0px;
            }
            input {
                border: #268bd2 1px solid;
                width:100%;
                padding: 10px;
                font-size: 18px;
            }
            input[type=text],input[type=password] {
                color:#0066ff;
            }
            input[type=submit] {
                border: #268bd2 1px solid;
                background-color: #268bd2;
                color: #fff;
            }
            .error_row {
                color: #FF001577;
                font-weight: bold;
                text-align: center;
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="pagename">SIGN IN</div>
        <div class="block_form">
            <div class="block_form_content">
                <form action="" method="POST" id="signin_form">
                    <div class="error_row"></div>
                    <div class="form_row">
                        <input type="text" name="login" placeholder="login" id="login">
                    </div>
                    <div class="form_row">
                        <input type="password" name="password" placeholder="password" id="password">
                    </div>
                    <div class="form_row">
                        <input type="submit" value="SIGN IN" id="signin_button">
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#signin_form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url:'/login',
                    method:'post',
                    dataType:'json',
                    data:{
                        login: $('#login').val(),
                        password: $('#password').val()
                    },
                    success:function(json) {
                        if (json.response) {
                            document.location.reload();
                        } else {
                            $('.error_row').text('User with current Password not found').css('display','block');
                        }
                    }
                });
            });
        });
    </script>
</html>