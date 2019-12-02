<?php

echo '<ul class="filetree" folder="'.$userfolder.'">';


function somefunc($folder)
{
    echo $folder.'<ul>';
    $files=    scandir($folder);

    foreach($files as $file) {


        if ($file != '.' && $file != '..') {
            echo '<li>';
            if (!is_dir($folder . '/' . $file)) {
                echo $file.'</li>';
                echo '<span>'.filesize($folder . '/' . $file).'</span>';
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


somefunc(getcwd().'/'.$userfolder);
?>
