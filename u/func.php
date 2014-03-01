<html>
<body>
<?php
	define("off_alph","87");
	define("off_num","48");
	define("base","31");
	define("max_len","8");
	function char_int($char){
		$ans=0;
		if($char == "v")
			$char="a";
		if($char == "w")
			$char="e";
		if($char == "x")
			$char="i";
		if($char == "y")
			$char="o";
		if($char == "z")
			$char="u";
		$temp=ord($char);
		if($temp >= ord("a") and $temp <= ord("z"))
			$ans=$temp - off_alph;
		if($temp>=ord("0") and $temp<=ord("9"))
			$ans=$temp-off_num;
		return $ans;
	}

	function int_char($int)	{
		if($int==(ord("a")-off_alph))
			$int = ord("v") - off_alph;
		if($int==(ord("e")-off_alph))
			$int = ord("w") - off_alph;
		if($int==(ord("i")-off_alph))
			$int = ord("x") - off_alph;
		if($int==(ord("o")-off_alph))
			$int = ord("y") - off_alph;
		if($int==(ord("u")-off_alph))
			$int = ord("z") - off_alph;
		if($int>=0 and $int<=9)
			$int=$int+off_num;
		if($int>=10 and $int<=35)
			$int=$int+off_alph;
		return chr($int);
	}
	//echo char_int("y");
	//$gh=29;
	//echo int_char($gh);
	//echo ord("a")-off_alph;
	function dec_base($id,$arr){
		$i=0;
		$h=0;
		while($id!==$h){
			$temp=(int)($id%base);
			array_push($arr,$temp);
			$id=(int)($id/base);
			$i=$i+1;
		}
		return $arr;
	}
	/*$arr=array();
	$arr = dec_base(3243242,$arr);
	$rt=count($arr);
	echo "$rt";
	//echo "$arr[3]";
	foreach ($arr as $gh)
		{echo "\n"."$gh";}*/
	function base_dec($arr){
		$sum=0;
		$temp=1;
		foreach ($arr as $gh){
			$sum=$sum+$temp*$gh;
			$temp=$temp*base;
		}
		return $sum;
	}
	//echo "\n".base_dec($arr);
	function shorten($id){
		$arr=array();
		$str='';
		$arr=dec_base($id,$arr);
		foreach ($arr as $gh){
			$str=$str.int_char($gh);
		}
		return $str;
	}
	//echo shorten(1324);
	function retrieve($str){
		$arr_s=str_split($str);
		$arr=array();
		foreach($arr_s as $gh){
			array_push($arr,char_int($gh));
		}
		return base_dec($arr);
	}
	//echo retrieve(shorten(13444444524));
?>
</body>
</html>