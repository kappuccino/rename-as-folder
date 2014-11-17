#!/usr/bin/php
<?php

$todo = count($argv);

echo '#'.$todo."\n";

if($todo <= 1) die("Mauvais usage\n");
#	print_r($argv);

for($i=1; $i<$todo; $i++){

	$dir = $argv[$i];
	$name = basename($dir);

	echo "FOLDER: ".$dir."\n";

	$files = array();
	$n = 1;

	if (is_dir($dir)) {
	    if ($dh = opendir($dir)) {
	        while (($file = readdir($dh)) !== false) {
	        	if(is_file($dir.'/'.$file)) $files[] = $file;
	        }
	        closedir($dh);
	    }
	    natsort($files);

	    foreach($files as $e){
	    	$final = $name.' - '.$e;
	    	rename($dir.'/'.$e, $dir.'/'.$final);
	    	#echo $final."\n";
	    }

	}else{
		echo "Ce dossier n'est pas un dossier !\n";
	}
}

echo "\n";