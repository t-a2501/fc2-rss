<?php

namespace Lib;

/**
 * ページャークラス
 */

class Pager
{

    public function pagenation($count, $limit, $page){
        if($count == 0) { 
            return null;
        }

        //ページの最大数
        $maxPage = ceil($count / $limit);
        //前後3ページ
        $startPage = (3 < $page) ? $page - 3 : 1;

        $endPage = (($startPage + 7) < $maxPage) ? $startPage + 7 : $maxPage;
        
        //url組み立て
        $urlparams = filter_input_array(INPUT_GET);

        $items = [];
    
        //最初
        $urlparams['page'] = 1;
        $items[] = sprintf('<span><a href="?%s">%s</a></span>'
            , http_build_query($urlparams)
            , '最初'
        );
        
        //先頭でない時
        if(1 < $page){
            $urlparams['page'] = $page - 1;
            $items[] = sprintf('<span><a href="?%s">%s</a></span>',
            http_build_query($urlparams),
            '前へ');
        }

        for ($i = $startPage; $i < $endPage; $i++) {
            $urlparams['page'] = $i;
            if($i == $page){
                // 開いているページ
                $items[] = sprintf('<span>%s</span>', $i 
                );
            } else {
                $items[] = sprintf('<span%s><a href="?%s">%s</a></span>'
                    , ($page == $i) ? ' class="current"' : ''
                    , http_build_query($urlparams)
                    , $i 
                );
            }
        }
    
        //表示中のページが最後ではない時
        if ($page < $maxPage) {
            $urlparams['page'] = $page + 1;
            $items[] = sprintf('<span><a href="?%s">%s</a></span>'
                , http_build_query($urlparams)
                , '次へ'
            );
        }
    
        //最後
        $urlparams['page'] = $maxPage - 1;
        $items[] = sprintf('<span><a href="?%s">%s</a></span>'
            , http_build_query($urlparams)
            , '最後'
        );
    
        return sprintf('<div class="pagination">%s</div>', implode(PHP_EOL, $items));
    }
}