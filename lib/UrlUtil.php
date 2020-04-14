<?php

namespace Lib;

class UrlUtil
{

    /**
     * @return array 
     * ブログURLからユーザー名、サーバーNo、エントリーNoを返す
     * $match[1] = ユーザー名
     * $match[2] = サーバーNo
     * $match[3] = エントリーNo
     */
    public function urlToPreg($url)
    {
        if(is_null($url)) {
            return null;
        }

        if(preg_match('#^https?:\/{2}(\w+)\.blog(\d*).+blog-entry-(\d+)*#', $url, $match)){
            return $match;
        }

        return null;
    }

}