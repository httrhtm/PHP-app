<?php

require 'db_connection.php';

// 変数に入れる
$question = $_POST['question'];
$answers = $_POST['answer']; //配列

// --------------------------------------------------
// 問題の登録
// --------------------------------------------------
$sql = 'insert into questions (question, created_at)
            values (:question, current_timestamp())';
$stmt = $db->prepare($sql);

//実行
$stmt->execute([':question' => $question]);

// --------------------------------------------------
// 答えの登録
// --------------------------------------------------
$sql = 'insert into correct_answers (questions_id, answer, created_at)
            values ((select id from questions order by created_at desc limit 1),
                    :answer,
                    current_timestamp())';

$stmt = $db->prepare($sql);

foreach ($answers as $answer) {

    // 実行
    $stmt->execute([':answer' => $answer]);
}

// topページにリダイレクト
header("Location: list.php");
?>
