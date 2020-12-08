<?php
define("HOST", "localhost");
define("DB_NAME", "task00");
define("USER", "root");
define("PASS", "root");

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf8'");
try{
$pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS, $options);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	
$stmt = $pdo->query("select * from 4each_keijiban;");
} catch(Exception $e) {
	 echo $e->getMessage();
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>無題ドキュメント</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<header>
	<div class="logo">
		<img src="4eachblog_logo.jpg" alt="ロゴ">
	</div>
		<ul class="mainmenu">
			<li><a href="#">トップ</a></li>
			<li><a href="#">プロフィール</a></li>
			<li><a href="#">4eachについて</a></li>
			<li><a href="#">登録フォーム</a></li>
			<li><a href="#">お問い合わせ</a></li>
			<li><a href="#">その他</a></li>
		</ul>
	</header>
	<div class="main">
		<div class="left">
			<h1>プログラミングに役立つ掲示板</h1>
			<form action="insert.php" method="post" class="contact">
				<h2 class="form">入力フォーム</h2>
				<div class="formcontent">
					<label>ハンドルネーム</label>
					<input type="text" name="name">
					<label>タイトル</label>
					<input type="text" name="title">
					<label>コメント</label>
					<textarea cols="60" rows="15" placeholder="ここに記入" name="comments"></textarea>
					<input type="submit" value="送信します" class="submit">
				</div>
			</form>
			<?php foreach($stmt as $row){?>
			<div class="box1">
				<h2><?php echo $row["title"]?></h2>
				<p><?php echo $row["comments"]?></p>
				<p><?php echo $row["handlename"]?></p>
			</div>
			<?php }?>
		</div>
		<div class="right">
			<h2>人気の記事</h2>
			<ul class="submenu">
				<li><a href="#">PHPのオススメ本</a></li>
				<li><a href="#">PHP MyAdminの使い方</a></li>
				<li><a href="#">いま人気のエディタtop5</a></li>
				<li><a href="#">HTMLの基礎</a></li>
			</ul>
			<h2>オススメリンク</h2>
			<ul class="submenu">
				<li><a href="#">インターノウス株式会社</a></li>
				<li><a href="#">XAMPPのダウンロード</a></li>
				<li><a href="#">MAMPのダウンロード</a></li>
				<li><a href="#">Ecripsのダウンロード</a></li>
			</ul>
			<h2>カテゴリ</h2>
			<ul class="submenu">
				<li><a href="#">HTML</a></li>
				<li><a href="#">PHP</a></li>
				<li><a href="#">MYSQL</a></li>
				<li><a href="#">Javascript</a></li>
			</ul>
		</div>
	</div>
	<fotter>
	<p>copyright internous|4each blog is the one witch provides A to Z about programing</p>
	</fotter>
</body>
</html>