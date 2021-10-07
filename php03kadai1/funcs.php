<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str) {
  ;return htmlspecialchars($str, ENT_QUOTES);
}

// エラー発見の関数
function e(){
  ini_set("display_errors", 1);
  error_reporting(E_ALL);
}

// データベース接続の関数
function db_conn(){
  try {
    //ID:'root', Password: 'root'
    $pdo = new PDO('mysql:dbname=gs05_db;charset=utf8;host=localhost','root','root');
    return $pdo;
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }
};

// SQL発生時のエラー表示関数
function sql_error($stmt){
  $error = $stmt->errorInfo();
  exit('SQLError:' . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name) {
  header('Location: '. $file_name);
  exit();
}

