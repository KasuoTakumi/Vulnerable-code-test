<?php

//dbh
function get_dbh(){
    
    //初期化
    static $dbh = null;
    //すでに読み込んでいる場合には処理をスキップ
    if ($dbh === null) {
        $db_user = "root";
        $db_pass = "";
        $db_host = "localhost";
        $db_name = "test";
        $db_type = "mysql";
        //複文のSQLを無効・動的プレースホルダを無効
        $option = array("PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,PDO::ATTR_EMULATE_PREPARES => false");
        //データソースネームを使って接続
        $dbh = new PDO("$db_type:hots=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass, $option);
    }
    return $dbh;
}