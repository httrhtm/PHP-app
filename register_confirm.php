<?php
// --------------------------------------------------
// 入力値を取得
// --------------------------------------------------

// 直接入れると参照できないためPHP変数に入れる
$question = $_POST['question'];
$answers = $_POST['answer'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>register</title>
</head>
<body>
	<p>問題・答え登録確認</p>

	<?php include('./nav.php'); ?>

	<!-- register -->
	<div class="register">

		<form action="insert.php" method="post">
			<!-- 問題 -->

			<table>
				<tr>
					<th>問題:</th>
					<td>
						<input readonly name="question" value="<?php echo $question ?>">
					</td>

				</tr>
			</table>

			<!-- 答え -->
			<?php
			foreach ( $answers as $answer) {
        	?>
			<table>
				<tr>
					<th>答え:</th>
					<td>
						<input readonly name="answer[]" value="<?php echo $answer ?>">
					</td>
				</tr>
			</table>
			<?php
			}
			?>

			<button type="button" onclick="location.href='register.php'">戻る</button>
			<button type="submit">登録</button>

		</form>

	</div>
</body>
</html>