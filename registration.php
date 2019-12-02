<?php session_start(); $_SESSION['start']=1; var_export($_SESSION);

?>
    <html>
<head>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .file a {
            color: red;
        }

    </style>
<script>
    $(document).ready(function() {
//        $('a').click(function(e) {e.preventDefault();});
        document.querySelector("#email").onkeyup=function() //событие
        {
            $.post(  //запуск аякс
                "reg.php",   //адрес
                {action: "check",  email: this.value} , //что передаем (значение внутри инпут)
         function(data) {

                    if(data>0) {  $('#email').css("border","4px solid red");
                        document.querySelector('input[type="submit"]').disabled = true;
                    }
                    else {  $('#email').css("border","4px solid green");
                        document.querySelector('input[type="submit"]').disabled = false;
                    }

                        }  //что делаем с ответом
        )}  ;


        $("#regform").submit(function(e) {   //событие подтверждение

            e.preventDefault();  // не перезагружать
           $("#loader").show();

            $.post("controller.php",{
                    action: "register", //действие которое нам нужно от php
                    email:document.querySelector("#email").value,   //js
                pass: document.querySelector("#pass").value} ,                      //jquery

                function(data) {  //обработка ответа  (получилась ли регистрация?)
                //data это ID юзера
             $("#result").text(data);   //записать контент в див
                if(data) {  $("#loader").hide();
                window.location="welcome.php";

                }  //прячем  loader

            } );
        //    alert("submit");
        });

    });
</script>
</head>
<body>
<a href="google.com">google</a>
<?php
include("form.html");
?>
<div style="display:none;"  id="loader"><img src="https://media.giphy.com/media/RddAJiGxTPQFa/giphy.gif"></div>
<div id="result"></div>
