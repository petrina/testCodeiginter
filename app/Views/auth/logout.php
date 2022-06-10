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
        </style>
    </head>
    <body>
        <div class="pagename">LOG OUT</div>
        <div class="block_form">
            <div class="block_form_content">
                <div class="form_row">
                    <input type="submit" value="LOG OUT" id="logout_button">
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#logout_button').on('click', function() {
            $.ajax({
                url:'/logout',
                method:'post',
                dataType:'json',
                success:function(json) {
                    if (json.response) {
                        alert('GOOD BYE');
                        document.location.reload();
                    }
                }
            });
        });
    });
</script>
</html>