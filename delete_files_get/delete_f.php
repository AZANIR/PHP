<?php
$file = $_GET['file'];
if (file_exists($file))
{
	echo "delete file  $file";
	unlink ($file);
}
?>