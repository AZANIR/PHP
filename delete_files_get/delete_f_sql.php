<?php
// сервер БД
define('HOST','localhost');
// пользователь
define('USER','admin');
// пароль
define('PASS','pass');
// БД
define('DB','db_base');

mysql_connect(HOST,USER,PASS) or die ('No connect to Server');
mysql_select_db(DB) or die ('No connect to DB');
mysql_query("SET NAMES 'UTF8'") or die ('Cant set charset');

$id_file = $_GET['id_file'];
$sSQL2=mysql_fetch_assoc(mysql_query("SELECT `img` FROM `_products` WHERE `out_id` = '$id_file'"));
$item = $sSQL2['item'];
foreach($sSQL2 as $item)
{
	$files = split('[,]', $item);
	foreach($files as $file)
	{
		if (file_exists($file))
		{
			echo "delete file  $file";
			unlink($file);
		}
	}
}
?>
