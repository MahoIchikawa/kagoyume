<?php

//DBへの接続を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=kagoyume_db; charset=utf8','GEEKJOB','mahomaho');
        //SQL実行時のエラーをtry-catchで取得できるように設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}

//ログイン
function login($name, $password){

  //db接続を確立
  $login_db = connect2MySQL();

  //ユーザ名のSQL
  $login_sql = "SELECT * FROM user_t WHERE name = '$name' AND password = '$password'";

  //クエリとして用意
  $login_query = $login_db->prepare($login_sql);


  //SQLを実行
  try{
      $login_query->execute();
  } catch (PDOException $e) {
      $login_query=null;
      return $e->getMessage();
  }
  //レコードを連想配列として返却
    return $login_query->fetchAll(PDO::FETCH_ASSOC);
}

//データ表示
function mydata($id){
  //db接続を確立
  $detail_db = connect2MySQL();

  $detail_sql = "SELECT * FROM user_t WHERE userID=:id";

  //クエリとして用意
  $detail_query = $detail_db->prepare($detail_sql);

  $detail_query->bindValue(':id',$id);

  //SQLを実行
  try{
      $detail_query->execute();
  } catch (PDOException $e) {
      $detail_query=null;
      return $e->getMessage();
  }

  //レコードを連想配列として返却
  return $detail_query->fetchAll(PDO::FETCH_ASSOC);

}

//新規登録
function insert_profiles($name, $password, $mail, $address){
    //db接続を確立
    $insert_db = connect2MySQL();

    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO user_t(name,password,mail,address,newDate)"
            . "VALUES(:name,:password,:mail,:address,:newDate)";

    //現在時をdatetime型で取得
    $datetime =new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    //クエリとして用意
    $insert_query = $insert_db->prepare($insert_sql);

    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query->bindValue(':name',$name);
    $insert_query->bindValue(':password',$password);
    $insert_query->bindValue(':mail',$mail);
    $insert_query->bindValue(':address',$address);
    $insert_query->bindValue(':newDate',$date);

    //SQLを実行
    try{
        $insert_query->execute();
    } catch (PDOException $e) {
        //接続オブジェクトを初期化することでDB接続を切断
        $insert_db=null;
        return $e->getMessage();
    }

    $insert_db=null;
    return null;
}

//削除
function delete_profile($id){

	//db接続を確立
	$delete_db = connect2MySQL();
	$delete_sql = "UPDATE user_t SET deleteFlg=1 WHERE userID = :id";
	//クエリとして用意
	$delete_query = $delete_db->prepare($delete_sql);
	$delete_query->bindValue(':id',$id);
	//SQLを実行
	try{
		$delete_query->execute();
	} catch (PDOException $e) {
		$delete_query=null;
		return $e->getMessage();
	}
	return null;
}

//プロフィール更新
function update_profile($id, $name, $password, $mail, $address){
    //db接続を確立
    $update_db = connect2MySQL();

    $update_sql = "UPDATE user_t SET name='$name',password='$password',mail='$mail',address='$address' WHERE userID = $id";

    //クエリとして用意
    $update_query = $update_db->prepare($update_sql);

    //var_dump($update_sql);

    //SQLを実行
    try{
        $update_query->execute();
    } catch (PDOException $e) {
        $update_query=null;
        return $e->getMessage();
    }
    return null;
  }
?>
