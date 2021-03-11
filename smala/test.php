<?php
$url='https://www.twitch.tv/leboxon/';
//fopen opens webpage in Binary
$handle=fopen($url,"rb");
// initialize
$lines_string="";
// read content line by line
do{
	$data=fread($handle,1024);
	if(strlen($data)==0) {
		break;
	}
	$lines_string.=$data;
}while(true);
//close handle to release resources
fclose($handle);
//output, you can also save it locally on the server
echo $lines_string;
?>