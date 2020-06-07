<?php

/**
 * FC2ブログの最新記事情報を取得し保存する
 */

require_once __DIR__ .'/../lib/AutoLoad.php';

try {

    $dataList = (new \Core\Fc2Api())->getFc2BlogData();
    $cnt = (new \Controller\SaveFc2BlogsController())->save($dataList);
    
    if($cnt > 0){
        echo "Update Success:" .$cnt;
    }
}catch(Exception $e){
    echo 'Failue';
    echo "Message: $e ";
}

?>