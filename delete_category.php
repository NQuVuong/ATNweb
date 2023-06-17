<?php
    require_once 'connect.php';
    $conn = new connect();
    $dblink = $conn->connectToPDO();
    if(isset($_GET['cid'])):
        $value = $_GET['cid'];
        $sqlSelect = "DELETE FROM `category` WHERE cat_id = ?";
        $stmt = $dblink->prepare($sqlSelect);
        $execute = $stmt->execute(array("$value"));
        if($execute){
            header("Location: category_management.php");
        }else{
            echo "Failed".$execute;
        }
    endif;
?>