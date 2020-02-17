<?php

require_once "includes.php";
$controller = new controller();

$json = false;
if(isset($_GET['json'])){
    $json = true;
}

if(isset($_GET['action'])){
    switch ($_GET['action']){
        case 'london_users':
            $users = $controller->get_users_in_london($json);
            if($users){
                print_r($users);
            }
            break;
        case 'london_proximity':
            $users = $controller->get_users_around_london($json);
            if($users){
                print_r($users);
            }
            break;
        case 'get_combine':
            $aro = $controller->get_users_around_london(50);
            $in = $controller->get_users_in_london(50);

            if(is_array($aro) && is_array($in)){
                $comb = array_combine($aro, $in);
                if($json){
                    print_r(json_encode($comb));
                }else{
                    print_r($comb);
                }
            }else{
                die("error");
            }
            break;
    }
}
