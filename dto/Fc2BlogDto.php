<?php

namespace Dto;

use Dto\BaseDto;

class Fc2BlogDto extends BaseDto
{
    //ユーザー名
    private $userName = null;
    //サーバーNo
    private $serverNo = null;
    //エントリーNo
    private $entryNo = null;
    //サブジェクト
    private $subject = null;
    //タイトル
    private $title = null;
    //Desctiption
    private $description = null;
    //url
    private $url = null;
    //投稿日付
    private $entryDate = null;

    public function toArray()
    {
        $list = array();
        
        $list['id'] = $this->id;
        $list['userName'] = $this->userName;
        $list['serverNo'] = $this->serverNo;
        $list['entryNo']  = $this->entryNo;
        $list['subject']    = $this->subject;
        $list['title']    = $this->title;
        $list['description'] = $this->description;
        $list['url'] = $this->url;
        $list['entryDate'] = $this->entryDate;

        return $list;
    }

    /**
     * @return ユーザー名
     */
    public function getUserName()
    {
        return $this->userName;
    }
    /**
     * @param ユーザー名
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getServerNo()
    {
        return $this->serverNo;
    }

    public function setServerNo($serverNo)
    {
        $this->serverNo = $serverNo;
    }

    public function getEntryNo()
    {
        return $this->entryNo;
    }

    public function setEntryNo($entryNo)
    {
        $this->entryNo = $entryNo;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getEntryDate()
    {
        return $this->entryDate;
    }

    public function setEntryDate($entryDate)
    {
        $this->entryDate = $entryDate;
    }
    
}