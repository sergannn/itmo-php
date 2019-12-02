<?php

$query = mysqli_query($link,'select * from users.users');
$res=mysqli_fetch_all($query,MYSQLI_ASSOC);
//  print_r($res);
echo '<form>';
echo '<select name="selected">';
foreach($res as $k=>$v)
{
    echo '<option value="'.$v['id'].'" >'.$v['name'].'</option>';
}
echo '</select><input  type="submit"></form>';
?>