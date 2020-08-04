<?php
	header("Access-Control-Allow-Origin: *");
	header('Content-type: text/plain; charset=utf-8');
	include 'preg_find.php';
	$html = '';
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

			$html .= '<div class="grid-item '.$size.'" name="'.$stats['basename'].'">'
			.'<img class="thumbnail" src="https://cloud-projects.000webhostapp.com/cloud/public/models/'.$stats['basename'].'.png'.$thumb.'" onerror="this.src=\'img/default.png\'"/>'
			.'<div class="title">'.$title.'<br><small>'.date("Y M d H:i",$stats['stat']['mtime']).'</small></div>'
			.'</div>';
			if ($size == 'big') {
			$html .= '<div class="grid-item small">'
			.'<img class="thumbnail" src="img/cube.png"/>'
			.'<div class="title">Naujas<br>projektas</div>'
			.'</div>';
			}
			$size = 'small';
			$thumb = '';
	}
	}

	echo $html;
	
?>
