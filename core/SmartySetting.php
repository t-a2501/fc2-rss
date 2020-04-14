<?php

// composerのautoloadを呼出す。
require_once __DIR__ .'/../vendor/autoload.php';

class SmartySetting extends Smarty{
  
    public function __construct() {
        // ドキュメントルート設定
        $ROOT = $_SERVER ["DOCUMENT_ROOT"];

        // Smartクラスを宣言
        $smarty = new Smarty();
        // htmlテンプレートファイルディレクト設定
        $smarty->template_dir =  $ROOT.'/view';
        // キャッシュのファイルディレクトリ設定
        $smarty->compile_dir = $ROOT . '/../Smarty/templates_c';
        $smarty->cache_dir =   $ROOT . '/../Smarty/cache';
        $smarty->config_dir =  $ROOT . '/../Smarty/configs';
    }
}