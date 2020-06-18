//пример запроса к файлу на сервере
//файл для удаления должен находиться на сервее в папке с файлами для удаления
http://sometestdomain.tk/1/delete_file.php?file=435.jpg

//отправляем гет запросом 
<?php
$file = $_GET['file']; // Можно добавить перед именем файла путь к директории
if (file_exists($file))
{
unlink ($file);
}
?>

//удаление нескольких файлов массивом.
//запросом
http://sometestdomain.tk/1/delete_files.php?filear=123.jpg,046.jpg

<?php
$filear = $_GET['filear'];
$files = split('[,]', $filear);
foreach($files as $file)
{
	if (file_exists($file))
	{
		unlink($file);
	}
}
?>

//удаление файлов с запросом из БД
//запросом
http://sometestdomain.tk/delete_files2.php?id_file=630358998

<?php
// сервер БД
define('HOST','localhost');
// пользователь
define('USER','admin');
// пароль
define('PASS','pass');
// БД
define('DB','pass');

mysql_connect(HOST,USER,PASS) or die ('No connect to Server');
mysql_select_db(DB) or die ('No connect to DB');
mysql_query("SET NAMES 'UTF8'") or die ('Cant set charset');

$id_file = $_GET['id_file'];
$sSQL2=mysql_fetch_assoc(mysql_query("SELECT `img` FROM `_products` WHERE `out_id` = '$id_file'"));
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