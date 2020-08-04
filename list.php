<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-type: application/json; charset=utf-8");
	include 'preg_find.php';
	$list = [];
	$size = 'big';
	$thumb = '?thumb='.mt_rand();
	$files = preg_find('/./', 'public/models',
		 PREG_FIND_RECURSIVE|PREG_FIND_RETURNASSOC|PREG_FIND_SORTMODIFIED|PREG_FIND_SORTDESC);
     
	foreach($files as $file => $stats) {
	    $filename = 'public/models/'.$stats['basename'];
	    if (substr($filename, -4) != ".png") {
			  $arr = file($filename);
			  $line = $arr[3];
			  $keys = preg_split("/[:]+/",$line);
			  $title = preg_replace('/[,"]/i', '', $keys[1]);
			  $project = [ 'id' => $stats['basename'], 'title' => $title, 'date' => date("Y M d H:i",$stats['stat']['mtime']), 'size' => $size ];
			  array_push($list, $project);
			  if ($size == 'big') {
				  $size = 'small';
				  $project = [ 'id' => 'new', 'title' => 'Naujas projektas', 'size' => $size ];
				  array_push($list, $project);
			  }
	    }
	}
	echo json_encode($list)
?>
