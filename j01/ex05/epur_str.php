#!/usr/bin/php 
<?PHP
 $array = array();
 unset($argv[0]);
 foreach($argv as $v)
 {
	 $var = array_filter(explode(' ', $v));
	 foreach ($var as $v2)
		 $array[] = $v2;
 }
 sort($array);
 foreach ($array as $v)
	 echo $v."\n";
?>