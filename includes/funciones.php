<?php
#---------------------------------------
function hextobin($hexstr){
	$bb='';
	$len=strlen($hexstr);
	for($i=0;$i<=($len-2);$i=($i+2)){
		$sub=substr($hexstr,$i,2);
		$dec=hexdec($sub);
		$bin=chr($dec);
		$bb=$bb.$bin;
	}
return $bb;
}
#---------------------------------------


#---------------------------------------
function hex2bin($str){
	$binstr="";
	$len=strlen($str);
	for($i=0;$i<=($len-2);$i=$i+2){
		$hex=substr($str,$i,2);
		$binstr.=chr(hexdec($hex));
	}
return $binstr;	
}
#---------------------------------------

#---------------------------------------
function GetDataByID($id_source){
	$q='select contenido from source where id="'.$id_source.'"';
	$r=mysql_query($q);
	$array=mysql_fetch_array($r);
	$str=$array["contenido"];
	if(mysql_error()){
		$str=mysql_error();
	}
	return hex2bin($str);
}
#---------------------------------------
?>

