<?php
/* automaticly includes a php file with a class in it, as long as the file 
has the same name as the class*/
spl_autoload_register(function ($className) {
    require lcfirst($className) . '.php';
});
?>