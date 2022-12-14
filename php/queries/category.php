<?php
function getCategories($filter = '', $fields = '*', $bindParams = ''){
    $mysqli = connection();
    $stmt = $mysqli -> prepare("SELECT $fields FROM user_category $filter");
   
    if(isset($bindParams) && !empty($bindParams)){
        $dataTypes = $bindParams[0];
        unset($bindParams[0]);
        $stmt -> bind_param($dataTypes, ...$bindParams);
    }

    $stmt -> execute();
    $categories = $stmt->get_result();

    $stmt -> close();
    $mysqli -> close();


    return $categories;

}








?>