<?php

require_once __DIR__ .'/../lib/AutoLoad.php';
require_once __DIR__ .'/../vendor/AutoLoad.php';

/**
 * FC2ブログ検索処理
 */

if(!empty($_GET)){
    
    $controller = new Controller\SearchFc2BlogsController();

    $data = $controller->search();

    $ROOT = $_SERVER ["DOCUMENT_ROOT"];

    $smarty = new Smarty();

    // htmlテンプレートファイルディレクト設定
    $smarty->template_dir =  $ROOT . '/view';
    // キャッシュのファイルディレクトリ設定
    $smarty->compile_dir = $ROOT . '/../Smarty/templates_c';
    $smarty->cache_dir =   $ROOT . '/../Smarty/cache';
    $smarty->config_dir =  $ROOT . '/../Smarty/configs';

    $smarty->assign("result", $data);

    $smarty->display("index.tpl");
}