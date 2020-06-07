<?php

/**
 * 2週間前のブログデータを削除する
 */

require_once __DIR__ .'/../lib/AutoLoad.php';

try{

    $cnt = (new \Controller\DeleteFc2BlogsController())->delete();        

}catch(Exception $e){
    echo 'Failue';
    echo "Message: $e ";
}
