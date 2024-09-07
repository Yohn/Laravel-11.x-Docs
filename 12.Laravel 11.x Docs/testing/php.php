<?php
$md = file_get_contents(__DIR__.'/md.md');
preg_match_all('/#### (.+?)\n/', $md, $out, PREG_PATTERN_ORDER);
foreach($out[1] as $line){
	$rm = str_replace('`', '', $line);
	$ex = explode('()', $rm);
	$link[] = '['.$ex[0].'](<#'.$line.'>)';
}
echo implode("\n", $link);
//print_r($link);