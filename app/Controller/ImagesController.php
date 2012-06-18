<?php
class ImagesController extends AppController {
	
	var $name = 'Image';
	var $uses = array();
	
	// variables
	var $cache_dir = 'img/cache';
	var $error_img = 'img/cache/error.jpg';
	var $types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp");


	/**
	 * displays and resizes an image
	 * @width 	= width to resize image to
	 * @height 	= height to resize image to
	 * @resize 	= true/false
	 * @src 	= src dir of image from root
	 */
	function view() {
		// get params
		$width = $this->params['pass'][0];
		$height = $this->params['pass'][1];
		$noresize = $this->params['pass'][2];
		$url = $this->_get_url($this->params['pass']);

		// get full image path
		$full_path = 'http://'.$url;

		// check file exists
		if(1) { //file_exists($full_path)) {
			// get size of image
			$size	= getimagesize($full_path);
			// get mimetype
			$mime	= $size['mime'];

			// if either width or height is an asterix
			if($width == '*' || $height == '*') {
				if($height == '*') {
					// recalculate height
					$height = ceil($width / ($size[0]/$size[1]));
				} else {
					// recalculate width
					$width = ceil(($size[0]/$size[1]) * $height);
				}
			} else {
				if (($size[1]/$height) > ($size[0]/$width)) {
					$width = ceil(($size[0]/$size[1]) * $height);
				} else {
					$height = ceil($width / ($size[0]/$size[1]));
				}
			}

			// include folder in filename
			$dir_path = preg_replace("/[^a-z0-9_]/", "_", strtolower(dirname($url)));
			$dir_path .= '-'.basename($url);
	
			// create new file names
			$file_relative = $this->cache_dir.'/'.$width.'x'.$height.'_'.$dir_path;
			$file_cached = WWW_ROOT.$this->cache_dir.DS.$width.'x'.$height.'_'.$dir_path;
	
			// if cached file already exists
			if(file_exists($file_cached)) {
				// get image sizes
				$csize = getimagesize($file_cached);
				// check that cached file is correct dimensions
				$cached = ($csize[0] == $width && $csize[1] == $height);
				// check file age
				if (@filemtime($cachefile) < @filemtime($url))
					$cached = false;
			} else {
				$cached = false;
			}

			// if file not cached
			if(!$cached) {
				$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
			} else {
				$resize = false;
			}
	

			// do not resize if set to true
			if($noresize == 'true') {
				$resize = false;
				$cached = false;
			}
	
			// if image resize is necessary
			if($resize) {
				// image
				$image = call_user_func('imagecreatefrom'.$this->types[$size[2]], $full_path);
				if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor ($width, $height))) {
					imagecopyresampled ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
				} else {
					$temp = imagecreate($width, $height);
					imagecopyresized($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
				}
				call_user_func("image".$this->types[$size[2]], $temp, $file_cached);
				imagedestroy($image);
				imagedestroy($temp);
			} elseif(!$cached) {
				// copy original file
				copy($full_path, $file_cached);
			}

			// get file contents
			$data	= file_get_contents($file_cached);		
		} else {
			die(var_export($full_path));
			$size	= getimagesize($full_path);
			$mime	= $size['mime'];
			$data = file_get_contents($full_path);
		}

		// set headers and output image
		header("Content-type: $mime");
		header('Content-Length: ' . strlen($data));
		echo $data;
		exit();
	}


	/**
	 * gets the url from the parameters
	 */
	function _get_url($params) {
		// init
		$url = '';
		// unset unwanted params
		unset($params[0], $params[1], $params[2]);
		// loop through params
		foreach($params as $p) {
			$url .= $p.'/';
		}
		// remove last slash
		$url = substr($url, 0, strrpos($url, '/'));
	return $url;
	}
}
?>
