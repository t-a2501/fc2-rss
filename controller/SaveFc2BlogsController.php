<?php

namespace Controller;

use Model\SaveFc2BlogsModel;

/**
 * Fc2ブログ情報保存コントローラ
 */
class SaveFc2BlogsController extends BaseController
{
    public function save($dataList = array()){
        $model = new SaveFc2BlogsModel();
        return $model->insertBlogs($dataList);
    }
}