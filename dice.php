<?php
function h($str)
{
	return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

if(!empty($_POST['send'])){
	if(is_int((int)$_POST['dice'])){
		if($_POST['dice'] <= 1 && $_POST['dice'] <= 6){
			$result = 7 - h($_POST['dice']);
		}
	}
}
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<?php if(empty($_POST['send'])):?>
		<form action="" method="post">
			<p>サイコロの目を入力してください。(数字は1-6にして下さい。)	
			<select name="dice">
				<?php for($i = 1; $i <= 6; $i++):?>
					<option<?=($i == h($_POST['dice']) ? ' selected' : '')?>><?=$i?></option>
				<?php endforeach;?>
			</select>
			<input type="submit" name="send" value="送信">
		</form>
	<?php else:?>
		サイコロの裏の目は<?=(!empty($result) ? $result : '・・・こら！デベロッパーツールで改変しちゃだめだよ！')?>です。
	<?php endif;?>
</body>
</html>