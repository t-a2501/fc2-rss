<?php

namespace Model;

class SearchFc2Model extends BaseModel
{

    private static $SEARCH_SQL = "SELECT id, userName, serverNo, entryNo, title, description, url, entryDate FROM fcblogs ";

    private static $COUNT_SQL  = "SELECT COUNT(id) as cnt  FROM fcblogs "; 

    function search($condition = array()){

        $sql = self::$SEARCH_SQL;
        //WHERE句成型
        $data = $this->makeWhere($condition);

        if(!empty($data["where"])){            
            $sql = $sql . ' WHERE '. implode(' AND ', $data['where']);
        }

        $sql = $sql . ' ORDER BY entryDate DESC ';
        
        $data = $this->fetchAllLimitOffset($sql , $data['params'], array() ,$condition['limit'], $condition['page']);

        return $data;
    }

    public function count($condition){

        $sql = self::$COUNT_SQL;
        //WHERE句成型
        $data = $this->makeWhere($condition);

        if(!empty($data['where'])){
            $sql = $sql . ' WHERE '. implode(' AND ', $data['where']);
        }

        $result = $this->fetchAllNormal($sql,$data['params'], array());

        return $result[0]['cnt'];
    }


    public function makeWhere($condition = array()){

        $where = array();
        $params = array();

        if(!empty($condition['entryDate'])){
            $where[] = ' DATE_FORMAT(`entryDate`, \'%Y-%m-%d\') = :entryDate ';
            $params['entryDate'] = $condition['entryDate'];
        }

        if(!empty($condition['userName'])){
            $where[] = ' userName = :userName ';
            $params['userName'] = $condition['userName'];
        }
        
        if(!empty($condition['url'])){
            $where[] = ' url = :url ';
            $params['url'] = $condition['url'];
        }

        if(!empty($condition['entryNo'])){
            $where[] = ' entryNo >= :entryNo ';
            $params['entryNo'] = $condition['entryNo'];
        }

        if(!empty($condition['serverNo'])){
            $where[] = ' serverNo = :serverNo ';
            $params['serverNo'] = $condition['serverNo'];
        }

        return array("where" => $where,"params" => $params);
    }

}