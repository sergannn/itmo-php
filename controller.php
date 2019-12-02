<?php
session_start();
//var_export($_SESSION);
require_once("connect.php");

if ($_POST["action"]=="check") { //проверка занято ли имя в форме

     $query = 'select * from users.users where name="'.$_POST['email'].'"';
    $checklogin = mysqli_query($link, $query);
    echo $logincount = mysqli_affected_rows($link);

}
if ($_POST["action"]=="register") { //регистрация
//var_export($_POST);
 $mail = $_POST['email'];
 $pass = $_POST['pass'];

    $mail = mysqli_real_escape_string($link, $mail); //очистка строки
    $pass = mysqli_real_escape_string($link, $pass); //очистка строки зачем?
 echo    $query = 'INSERT INTO users.users VALUES (NULL,"' . $mail . '","' . md5($pass) . '")';

$register = mysqli_query($link, $query);
echo mysqli_errno($link) ;
    if (mysqli_errno($link) == 1062) {
 echo 'Уже есть';
} elseif (mysqli_errno($link) == 0) {
// echo 'no errors';
echo $afrows = mysqli_affected_rows($link);
if ($afrows==1) {
     echo 'ok';

$_SESSION['user_id']=mysqli_insert_id($link); //последний id автоинкремента после insert

echo mysqli_insert_id($link);

//       header("Location: welcome.php"); /* Перенаправление браузера */
}
else {echo 'error';}
}
}

if($_POST['action']=="filecontent") {echo file_get_contents($_POST['filename']);}

if($_POST['action']=="file_save_content") {echo file_put_contents($_POST['filename'],$_POST['content']);}

?>

