<?php

namespace Model;

use Core\Database;

abstract class BaseModel 
{
    protected $db;

    function __construct(){
        $this->db = Database::connect();
    }

    /**
     * SQL実行-作用行数を返す
     * @param SQL, PARAM, PARAMTYPE
     */
    public function execute($sql, $params = array(), $types = array()){
        try{

            $stmt = $this->db->getConnection()->prepare($sql);
            foreach($params as $key => $param) {
                $stmt->bindValue($key , $param, empty($types[$key])? \PDO::PARAM_STR : $types[$key]);
            }

            $stmt->execute();
            return $stmt->rowCount();
            
        }catch(Exception $e){
            echo "SQL Failue: " . $sql;
        }
    }

    public function fetchAllNormal($sql, $params, $types){
        return $this->fetchAllLimitOffset($sql, $params, $types );
    }


    public function fetchAllLimitOffset($sql, $params, $types = array(), $limit = null, $page = 1){
        try{

            if(!is_null($limit)){
                $sql = $sql . " LIMIT $limit ";
            }
            
            if($page > 1) {
                $sql = $sql . " OFFSET  " . ($page * $limit);
            }

            $stmt = $this->db->getConnection()->prepare($sql);
            foreach($params as $key => $param) {
                $stmt->bindValue($key , $param, empty($types[$key])? \PDO::PARAM_STR : $types[$key]);
            }

            $stmt->execute();

            return $stmt->fetchAll();

        }catch(Exception $e){
            echo "SQL Failue: " . $sql;
            echo "message: " . $e;            
        }
    }
}