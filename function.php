<<<<<<< HEAD
<?php

/**
 * 获取一个函数主体
 * @param $file 某个文件
 * @param $funName 函数名称
 */
function getFunContent($file, $funName) {
	$fp = fopen($file , 'r');
	if(!$fp) {
		exit('<h1>文件 '.$file.'不存在</h1>');
	}
	
	$funcStr =  '' ;
	$where = [];

	$fileContent = file_get_contents($file);

	$pattern = '/function\s+'.$funName. '/';
	if( preg_match($pattern, $fileContent, $match) ) {
		$startPos = strpos($fileContent, $match[0]);
		
	} else {
		exit('<h1>在文件中 '.$file.'没有搜索到函数 <span style="color:red;">'.$funName.' </span></h1>');
	}

	fseek ($fp, $startPos);		// 移动指针在这里
	$flag = true ;
	while ($flag &&  (false  !== ($char = fgetc($fp))) ) {
		
		if($char == '{' ) {
			array_push($where, $char);
		}
		if($char == '}') {
			array_pop($where);
			empty($where) && $flag = false ; 
		}
		$funcStr .= $char ;
	}

	return  "<?php \n\n". $funcStr ;
=======
<?php

/**
 * 获取一个函数主体
 * @param $file 某个文件
 * @param $funName 函数名称
 */
function getFunContent($file, $funName) {
	$fp = fopen($file , 'r');
	if(!$fp) {
		exit('<h1>文件 '.$file.'不存在</h1>');
	}
	
	$funcStr =  '' ;
	$where = [];

	$fileContent = file_get_contents($file);

	$pattern = '/function\s+'.$funName. '/';
	if( preg_match($pattern, $fileContent, $match) ) {
		$startPos = strpos($fileContent, $match[0]);
		
	} else {
		exit('<h1>在文件中 '.$file.'没有搜索到函数 <span style="color:red;">'.$funName.' </span></h1>');
	}

	fseek ($fp, $startPos);		// 移动指针在这里
	$flag = true ;
	while ($flag &&  (false  !== ($char = fgetc($fp))) ) {
		
		if($char == '{' ) {
			array_push($where, $char);
		}
		if($char == '}') {
			array_pop($where);
			empty($where) && $flag = false ; 
		}
		$funcStr .= $char ;
	}

	return  "<?php \n\n". $funcStr ;
>>>>>>> 9f3a6222172ef2729b7110236749e75a272ff4ab
}