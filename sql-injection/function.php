<?php

//dsn
function get_dsn(){
    
    //初期化
    static $dsn = null;
    //すでに読み込んでいる場合には処理をスキップ
    if ($dsn === null) {
        //MySQL Login information
        $db_user = "root";
        $db_pass = "";
        $db_host = "localhost";
        $db_name = "test";
        $db_type = "mysql";
        
        //データソースネームを使って接続
        $dsn = new PDO("$db_type:hots=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    }
    return $dsn;
}