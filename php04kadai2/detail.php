<?php
require_once('funcs.php');
$pdo = db_conn();

$id = $_GET['id'];

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id = ' . $id . ';');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($status);
} else {
    $row = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">ユーザー登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->

    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>修正</legend>
                <label>名前：<input type="text" name="name" value="<?= $row['name']?>"></label><br>
                <label>ID：<input type="text" name="lid" value="<?= $row['lid']?>"></label><br>
                <label>パス：<input type="text" name="lpw" value="<?= $row['lpw']?>"></label><br>
                <label>管理<input type="number" name="kanri_flg" value="<?= $row['kanri_flg']?>"></label><br>
                <label>出社<input type="number" name="life_flg" value="<?= $row['life_flg']?>"></label><br>
                <input type="hidden" name="id" value="<?= $row['id']?>"></label><br>
                <input type="submit" value="修正">
            </fieldset>
        </div>
    </form>

    <!-- Main[End] -->

</body>

</html>
