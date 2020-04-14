<?php

namespace Lib;

class CookieUtil
{

    public function setCookies($name,array $values){
        foreach($values as $key => $value){
            if(!empty($value)){
                setcookie($name . '["' . $key . '"]' , $value, time() + 1800, "/" );
            }
        }
    }
    
    public function getArrayCookies($name){
        $data = array();
        if(isset($_COOKIE[$name])){
            foreach($_COOKIE[$name] as $key => $value) {
                $data[$key] = $value;
            }
        }
        return $data;
    }

}