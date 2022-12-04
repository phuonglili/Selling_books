<?php
function getGet($key)
{
	$value ='';
	if(isset($_GET[$key]))
	{
		$value = $_GET[$key];
        $value = fixSqlInject($value);
	}
	return trim($value);
}
function fixSqlInject($sql)
{
     $sql = str_replace('\\','\\\\', $sql);
     $sql = str_replace('\'','\\\'', $sql);
     return $sql;
}
function getPOST($key)
{
	$value ='';
	if(isset($_POST[$key]))
	{
		$value = $_POST[$key];
        $value = fixSqlInject($value);
	}
	return trim($value);
}
function getSecurityMD5($password)
{
	return md5(md5($password).PRIVATE_KEY);
}

