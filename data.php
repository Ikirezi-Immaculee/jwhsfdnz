<?php
//key element to do this challenge is to use get method
//no torelence the one who use post method
if (isset($_POST['Save'])) {
   
$classname=$_POST['classname'];
    echo 'Class ='.$classname. '<br>';
}
?>