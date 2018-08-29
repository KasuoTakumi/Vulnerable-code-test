<?php

include_once('./function.php');

$dsn = get_dsn();

//ユーザーからの情報取得
$user_id = $_POST['id'];
$password = $_POST['pass'];

//SQLの組み立てと実行
$sql = "SELECT * FROM users WHERE user_id = '$user_id' AND user_pass = '$password'";
echo $sql;
echo '<br>';
$check = $dsn->query($sql);
$n = $check->rowCount();

//ログイン判定
if($n > 0){
    echo "ログイン成功";
}else{
    echo "ログイン失敗";
}
