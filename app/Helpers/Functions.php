<?php
function isRole($dataArr, $moduleName, $role='view'){
    if(!empty($dataArr[$moduleName])){
        $roleArr = $dataArr[$moduleName];
        if(!empty($roleArr) && in_array($role, $roleArr)){
            return true;
        }
    }
    return false;
}


function convertToVND($amount)
{
    return number_format($amount, 0, ',', '.') . ' đ';
}
