<?php
echo '<ul>';


function somefunc($folder)
{
    echo $folder.'<ul>';
    $files=    scandir($folder);

    foreach($files as $file) {

        echo '<li>';
       if ($file != '.' && $file != '..') {
            if (is_file($folder . '/' . $file)) {
               echo $file;
                echo filesize($folder . '/' . $file);
            }
            else
            {
                $folder .= '/' . $file;
                somefunc($folder);
            }
                echo '</li>';

        }



    }
    echo '</ul>';


}


somefunc(getcwd());