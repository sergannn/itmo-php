<?php
//file_put_contents("folder92/filetree20.php","a");
//exit();
session_start();

//var_export($_POST);
//var_export($_FILES);

//if(isset

//session_destroy();
if(!isset($_SESSION['user_id'])) {         //не залогинен
        //можно использовать javascript echo 'script location href
    header("Location: registration.php");  //отправлем обратно
}

else {  //залогинен
    $uid=$_SESSION['user_id'];  //берем его id
    $userfolder='folder'.$uid;  //его папка будет folder+id
   if(! is_dir($userfolder))  //если ее нет
   {mkdir ( $userfolder);}    //создаем папку
}  //залогинен - все ок

if( isset($_FILES['file'])) //если пытается загрузить файл через форму
{
    $filename= $_FILES['file']['tmp_name'];  //имя файла во временной папке
    $newname= $_FILES['file']['name'];      //новое имя
   echo copy($filename,'folder'.$uid.'/'.$newname); //сохраняем файл

}

echo 'hello:'.$uid; //здороваемся

?>
<html>
<head>
    <meta charset="utf-8">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var clickedfilename; //инициализируем переменную на будущее
            console.log('ready');
            $('ul.filetree li').click(function() {  //при нажатии на любой li внутри ul
             if( $(this).children().length>0) { // означает, что нажали на папку
                 $(this).children().toggle();   // сворачиваем/разворачиваем li внутри ul
             }
             else                               // нажали на файл
             {
                  clickedfilename=$(this).html();  //запоминаем имя файла на который нажали


                    //отправляем пост запрос в контроллер - просим показать контент файла (file_get_content)
             $.post("controller.php",{action:"filecontent", filename: $(this).html() } ,function(data) {
                 $('textarea').text(data); // кладем полученный результат в textarea
               } );
             }
            });


            $('#save').click(function() {   //нажали на кнопку save
                //отправляем запрос в контроллер - он делает file_put_contents
            $.post("controller.php",{action:"file_save_content",content: $('textarea').text(), filename:clickedfilename});
            });
        });
    </script>
</head>
<body>

<?php
require_once("connect.php");
include("users_select_form.php"); //select из базы данных всех пользователей и построение <select> в foreach
echo '<hr>';
include("file_upload.html");   // форма для загрузки файлов
echo '<div style="display:flex">';
include("filetree20.php");  //дерево файлов
?>
<div>
    <form>
    <textarea name="content">
        file content
    </textarea>
        <input type="button" value="save" id="save">
    </form>
</div>
</div>
<script>

//function alert() {console.log   ("privet")}



</script>
</body>
</html>
