<?php
require_once('funcs.php');
e();

$pdo = db_conn();
$id = $_GET['id'];
// データ登録SQL作成
$stmt = $pdo->prepare('
                        SELECT
                            *
                        FROM
                            gs_bm_table
                        WHERE
                            id = '. $id . ';
                        ');
$status = $stmt->execute();

// データ表示
$view = '';
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorMessage:".$error[2]);
} else {
    $row = $stmt->fetch();
};
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ブックマーク登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="bm_update.php">
        <div class="jumbotron">
            <fieldset>  
                <legend>ブックレビュー投稿</legend>
                <label>本のタイトル：<input type="text" name="book" value="<?= $row['book']?>"></label><br>
                <label>書籍URL：<input type="text" name="url" value="<?= $row['url']?>"></label><br>
                <label>コメント：<textArea name="comment" rows="4" cols="40"><?= $row['comment']?></textArea></label><br>
                <label>隠しID：<input type="hidden" name="id" value="<?= $row['id']?>"></label><br>
                <input type="submit" value="修正">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>