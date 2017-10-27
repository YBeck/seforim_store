<?php
// function getArray(){
//     $keyArray = ['id', 'sefer_name', 'price', 'category', 'units_in_stock', 'cat_name', 'currentPage'];
//     $postArray = explode(',', $_POST['sefer']);
//     $array = array_combine ($keyArray , $postArray );
//     return $array;
// }

function getArray(String $inArray){
    $props = [];
    $postArray = explode('|', $inArray); //create an array of strings "key=value"
    foreach($postArray as $post){
        $retArray = explode('=', $post); //create an array of strings [0]=key [1]=value
        $props[$retArray[0]] =  $retArray[1]; //create an array  [key] = value
    }
    return $props;
}
    
?>