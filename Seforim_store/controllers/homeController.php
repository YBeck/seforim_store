<?php
include 'filterController.php';
include 'sortController.php';
include_once 'utils/optionArray.php';
$seferId = "";
if(isset($_POST['sefer'])):
    if(!empty($_POST['sefer'])):
        // $seferId = $_POST['sefer'];
        // ($seferId);
        $seferId = getArray($_POST['sefer'])['id']; //from optionArray.php
    else:
        $errors [] = "Please enter a Sefer";
    endif;        
endif;

$title = "Seforim";
include 'offsetController.php';
include 'models/updateModel.php';
include 'models/seforimModel.php';
include 'views/seforimView.php';
?>