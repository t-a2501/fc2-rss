<?php

namespace Lib;

/**
 * Classが定義されていない場合に、ファイルを探すクラス
 */

class ClassLoader
{
    // class ファイルがあるディレクトリのリスト
    private static $dirs;

    /**
     * クラスオートロード処理追加。
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    // 探索するディレクトリを登録
    public function registerDir($dir)
    {
        $this->dirs[] = $dir;
    }

    /**
     * クラスが見つからなかった場合呼び出されるメソッド
     * spl_autoload_register でこのメソッドを登録する
     * @param  string $class クラス名
     * @return bool
     */
    public static function loadClass($class)
    {
        foreach (self::directories() as $directory) {
        //foreach ($this->dirs as $directory) {
            //$file_name = "{$directory}/{$class}.php";
            $file_name = $directory . "/" . str_replace("\\","/",$class) . ".php";
            $file_name = str_replace("Controller/","controller/",$file_name);
            $file_name = str_replace("Lib/","lib/",$file_name);
            $file_name = str_replace("Model/","model/",$file_name);
            $file_name = str_replace("Dto/","dto/",$file_name);
	    $file_name = str_replace("Core/","core/",$file_name);
	    if (is_file($file_name)) {
                require $file_name;
                return true;
            }
        }
    }


    /**
     * ディレクトリリスト
     * @return array フルパスのリスト
     */
    private static function directories()
    {
        if (empty(self::$dirs)) {
            $base = "..";
            // self::$dirs = array(
            //     // 読み込むディレクトリ
            //     $base . "lib",
            //     $base . "models",
            //     $base . "core"
            // );
            self::$dirs = array(
                $base . ""
            );
        }

        return self::$dirs;
    }
}
