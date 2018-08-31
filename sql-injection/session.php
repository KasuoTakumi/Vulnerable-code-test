<?php

include_once('./function.php');

$dbh = get_dbh();

//ユーザーからの情報取得
$user_id = $_POST['id'];
$password = $_POST['pass'];

//IDとパスワードが正規表現にマッチしているか調べる
if(preg_match('/[a-zA-Z0-9]{3,16}/',$user_id)&&preg_match('/[a-zA-Z0-9]{8,16}/',$password)){

    //プレースホルダ
    $check = $dbh->prepare('SELECT id FROM users WHERE user_id = :id AND user_pass = :pass');
    //バインドする値
    $check->bindValue(':id',$user_id);
    $check->bindValue(':pass',$password);
    //SQLの実行
    $check->execute();
    //配列として値を取得
    @$data_array = $check->fetchAll(PDO::FETCH_ASSOC);

    $count = count($data_array);

    //ログイン判定
    if($count > 0){
        echo "ログイン成功";
    }else{
        echo "ログイン失敗";
    }

}else{
    //マッチしなかった場合
    echo '不正な入力値です';
}


