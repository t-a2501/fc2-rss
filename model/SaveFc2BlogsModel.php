<?php

namespace Model;

class SaveFc2BlogsModel extends BaseModel
{
    private static $INSERT_SQL = "INSERT INTO "
                                ." `fcblogs`(`userName`,`serverNo`,`entryNo`,`subject`,`title`,`description`,`url`,`entryDate`)"
                                ."  VALUES%s "
                                ."  ON DUPLICATE KEY UPDATE "
                                ." `title`=VALUES(`title`), "
                                ." `serverNo`=VALUES(`serverNo`),"
                                ." `entryNo`=VALUES(`entryNo`),"
                                ." `subject`=VALUES(`subject`),"
                                ." `title`=VALUES(`title`),"
                                ." `description`=VALUES(`description`),"
                                ." `url`=VALUES(`url`),"
                                ." `entryDate`=VALUES(`entryDate`) ";

    private static $INSERT_MAX_COUNT = 100;
    
    public function insertBlogs(array $dataList)
    {   

        $valueStrings = array();        
        $types = array();
        $mergeParams = array();

        $row = 0;

        // insert文生成
        foreach($dataList as $cnt => $dto){
            $valueParams = array();
            $valueParams[":userName{$cnt}"] = $dto['userName'];
            $valueParams[":serverNo{$cnt}"] = $dto['serverNo'];
            $valueParams[":entryNo{$cnt}"] = $dto['entryNo'];
            $valueParams[":subject{$cnt}"] = $dto['subject'];
            $valueParams[":title{$cnt}"] = $dto['title'];
            $valueParams[":description{$cnt}"] = $dto['description'];
            $valueParams[":url{$cnt}"] = $dto['url'];
            $valueParams[":entryDate{$cnt}"] = $dto['entryDate'];
            
            $types[":serverNo{$cnt}"] = \PDO::PARAM_INT;
            $types[":entryNo{$cnt}"]  = \PDO::PARAM_INT;

            $valueStrings[] = sprintf('(%s)', implode(',', array_keys($valueParams)));
            $mergeParams = array_merge($mergeParams, $valueParams);
            if (($cnt + 1) % self::$INSERT_MAX_COUNT === 0) {
                $row += $this->execute(sprintf(self::$INSERT_SQL, implode(',', $valueStrings)),
                    $mergeParams,
                    $types
                );
                $mergeParams = array();
                $valueStrings = array();
                $types = array();
            }
        }

        //var_dump($mergeParams);
        if(!empty($mergeParams)){
            $row += $this->execute(
                sprintf(self::$INSERT_SQL, implode(',', $valueStrings)),
                $mergeParams,
                $types
            );
            $valueParams = array();
            $valueStrings = array();
        }

        return $row;
    }
}