<?php

namespace Controller;

use Model\SearchFc2Model;
use Lib\Pager;
use Lib\CookieUtil;

class SearchFc2BlogsController extends BaseController
{

    public function search(){

        $model = new SearchFc2Model();
        $pager = new Pager();
        $cookieUtil = new CookieUtil();
        //リクエスト処理
        $form = array();

        //フォームデータを取得
        $form['entryDate'] = @$_GET['entryDate'];
        $form['url'] = @$_GET['url'];
        $form['userName'] = @$_GET['userName'];
        $form['serverNo'] = @$_GET['serverNo'];
        $form['limit'] = $_GET['limit'] ? $_GET['limit'] : DEFAULT_LIMIT_COUNT;
        $form['page'] = $_GET['page'] ? $_GET['page'] : 1;
        // 総件数
        $cnt  = $model->count($form);
        // データ取得
        $data = $model->search($form);
        //Cookieセット
        $cookieUtil->setCookies("Form" , $form);

        $result = array(
            "data"=>$data,
            "form"=>$form,
            "pager"=>$pager->pagenation($cnt, $form['limit'], $form['page']),
            "limit"=>$form['limit'],
            "offset"=>$form['offset']);

        //画面返却
        return $result;
    }
}