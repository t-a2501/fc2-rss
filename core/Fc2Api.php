<?php

namespace Core;

use Dto\Fc2BlogDto;
use Lib\UrlUtil;

class Fc2Api
{

    private $dcUrl = "http://purl.org/dc/elements/1.1/";

    public function getFc2BlogData($url = 'http://blog.fc2.com/newentry.rdf')
    {
        $blogList = array();
        $rdf = simplexml_load_file($url);

        $urlUtil = new UrlUtil();
        $cnt = 0;
        foreach ($rdf->item as $item) {
            $blogData = new Fc2BlogDto();
            
            $dc = $item->children($this->dcUrl);
            $match = $urlUtil->urlToPreg($item->link);

            if(!is_null($match)){
                $blogData->setUserName($match[1]);
                $blogData->setServerNo($match[2] === "" ? 0 : (int)$match[2]);
                $blogData->setEntryNo($match[3]);
                $blogData->setUrl((string)$item->link);
                $blogData->setSubject(trim((string)$dc->subject));
                $blogData->setTitle((string)$item->title);
                $blogData->setDescription((string)$item->description);
                $blogData->setEntryDate(date('Y-m-d H:i:s', strtotime($dc->date)));
                
                array_push($blogList, $blogData->toArray());
            }
            
        }
      
        return $blogList;
    }
}