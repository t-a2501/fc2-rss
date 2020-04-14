<?php

namespace Model;

class DeleteFc2BlogsModel extends BaseModel
{

    private static $DELETE_SQL = "DELETE FROM fcblogs WHERE createDate <= :createDate "; 

    public function delete($time){
        return $this->execute(self::$DELETE_SQL,  $time);
    }
}