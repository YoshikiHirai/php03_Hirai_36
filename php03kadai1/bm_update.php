<?php
require_once('funcs.php');
e();

$book = $_POST['book'];
$url = $_POST['url'];
$comment = $_POST['comment'];
$id = $_POST['id'];

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE
                        gs_bm_table
                    　 SET
                        book = :book,
                        url = :url,
                        comment = :comment
                    　 WHERE
                        id = :id;");

//  2. バインド変数を用意
$stmt->bindValue(':book', $book, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment , PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id , PDO::PARAM_INT);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
    redirect('select.pho');
}
?>
