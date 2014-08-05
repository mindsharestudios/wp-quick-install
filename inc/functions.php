<?php

if(!function_exists('_')) {
	/**
	 * @todo fix this or replace with gettext
	 *
	 * @param $str
	 */
	function _($str) {
		echo $str;
	}
}

/**
 * @todo check this for issues
 *
 * @param $str
 *
 * @return string
 */
function sanit($str) {
	return addcslashes(str_replace(array(';', "\n"), '', $str), '\\');
}

/**
 *
 * recursive delete a directory
 *
 * @param $dir
 *
 * @return bool
 */
function rrmdir($dir) {
	$files = array_diff(scandir($dir), array('.', '..'));
	foreach($files as $file) {
		(is_dir("$dir/$file") && !is_link($dir)) ? rrmdir("$dir/$file") : unlink("$dir/$file");
	}
	return rmdir($dir);
}

/**
 *
 * recursive copy a directory
 *
 * @param $source
 * @param $dest
 */
function rcopy($source, $dest) {
	if(is_dir($source)) {
		$dir_handle = opendir($source);
		while($file = readdir($dir_handle)) {
			if($file != "." && $file != "..") {
				if(is_dir($source."/".$file)) {
					if(!is_dir($dest."/".$file)) {
						mkdir($dest."/".$file);
					}
					rcopy($source."/".$file, $dest."/".$file);
				} else {
					copy($source."/".$file, $dest."/".$file);
				}
			}
		}
		closedir($dir_handle);
	} else {
		copy($source, $dest);
	}
}

function wpqi_get_url() {
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
	$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")).$s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
	return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}
