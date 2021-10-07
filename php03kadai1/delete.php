<?php
require_once('funcs.php');
e();
$pdo = db_conn();
$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE
                    FROM
                        gs_bm_table
                    WHERE
                        id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
$view = '';
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    redirect('select.php');
};