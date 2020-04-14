<?php

require_once "vendor/AutoLoad.php";
require_once __DIR__ . "/lib/AutoLoad.php";
require_once __DIR__ . "/lib/CookieUtil.php";

//require_once "core/SmartySetting.php";

// $smarty = new SmartySetting();
// // index.tplテンプレートを読み込む。
// $smarty->display('view/index.tpl');

// ドキュメントルート設定
$ROOT = $_SERVER ["DOCUMENT_ROOT"];

// Smartクラスを宣言
$smarty = new Smarty();
// htmlテンプレートファイルディレクト設定
$smarty->template_dir =  $ROOT . '/view';
// キャッシュのファイルディレクトリ設定
$smarty->compile_dir = $ROOT . '/../Smarty/templates_c';
$smarty->cache_dir =   $ROOT . '/../Smarty/cache';
$smarty->config_dir =  $ROOT . '/../Smarty/configs';

//クッキーから前回の検索条件を取得する。
$util = new Lib\CookieUtil();
$form = $util->getArrayCookies("Form");


$result = array(
    "data"=>null,
    "form"=>$form,
    "pager"=>null,
    "limit"=>null,
    "offset"=>null);

$smarty->assign("result",$result);

$smarty->display('view/index.tpl');

?>