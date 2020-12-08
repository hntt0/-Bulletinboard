<?php 
$name = $_POST["name"];
$title = $_POST["title"];
$comments = $_POST["comments"];

define("HOST", "localhost");
define("DB_NAME", "task00");
define("USER", "root");
define("PASS", "root");

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf8'");
try{
$pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS, $options);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$sql = "insert into 4each_keijiban(handlename, title, comments) values(:name, :title, :comments)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":title", $title, PDO::PARAM_STR);
$stmt->bindValue(":comments", $comments, PDO::PARAM_STR);
$stmt->execute();

header("Location: index.php");
exit;
} catch(Exception $e) {
	 echo $e->getMessage();
}

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>無題ドキュメント</title>
</head>

<body>
</body>
</html>