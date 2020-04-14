<?php

namespace Controller;

use Model\DeleteFc2BlogsModel;

/**
 * FC2ブログの情報削除コントローラ
 */
class DeleteFc2BlogsController extends BaseController
{

    public function delete(){
        $model = new DeleteFc2BlogsModel();
        return $model->delete(array(':createDate' => date('Y-m-d H:i:s',strtotime("-2 weeks"))));
    }
}