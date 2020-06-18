<?php
$filear = $_GET['filear'];
$files = split('[,]', $filear);
foreach($files as $file)
{
	if (file_exists($file))
	{
		echo "delete file  $file";
		unlink($file);
	}
}
?>