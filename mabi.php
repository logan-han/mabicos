
<!--암호화시 각줄 끝에 스페이스 없어야함. 마지막 문자 이후로 엔터 없어야함<br>-->
<form method=post>
해독해boa요<textarea name=aing></textarea>
<input type=submit>
<input type=hidden name=mode value=decode>
</form>
<form method=post>
암호화해boa요<textarea name=aing></textarea>
<input type=submit>
<input type=hidden name=mode value=encode>
</form>
<?
if($mode=="decode")		echo str_replace("http://php.chol.com/~loopnow/mabicos/?time=","",decode($aing));
if($mode=="encode") 	echo encode($aing);
function encode($input)
{
	$input=bin2hex($input);
	for($i=0;$i<=strlen($input)/2-1;$i++)
	{
		$hex[$i]=substr($input,$i*2,2);
		$hex[$i]=$hex[$i];
//		if(strlen($hex[$i])=="1") $hex[$i] = "0" . $hex[$i];
	}

if(strlen($input)/2%3==0) $count=strlen($input)/2/3-1;
else $count=strlen($input)/2/3;

	for($i=0;$i<=$count;$i++)
	{
		$seed[$i] = $hex[$i*3] . $hex[$i*3+1] . $hex[$i*3+2];
		if(strlen($seed[$i])=="4") $seed[$i] = $seed[$i] . "00";
		if(strlen($seed[$i])=="2") $seed[$i] = $seed[$i] . "0000";

		$check = substr(dechex(hexdec($seed[$i]) >> 0x0d),-1,1);

		$key = hexdec($seed[$i]) >> 0x0d;

// 귀찮음이 도를 넘었음

		if($check=="0" || $check=="8") $key = hexdec($seed[$i]) >> 0x0d;
		if($check=="f" || $check=="7") $key = $key-7;
		if($check=="e" || $check=="6") $key = $key-6;
		if($check=="d" || $check=="5") $key = $key-5;
		if($check=="c" || $check=="4") $key = $key-4;
		if($check=="b" || $check=="3") $key = $key-3;
		if($check=="a" || $check=="2") $key = $key-2;
		if($check=="9" || $check=="1") $key = $key-1;



/*
		if($check<=7) $key = substr_replace(dechex($key),"0",-1);
		else $key = substr_replace(dechex($key),"8",-1);
*/

		$seed[$i] = dechex(hexdec($seed[$i]) ^ $key);

	}

	for($i=0;$i<=$count;$i++)
	{
		$bin=decbin(hexdec($seed[$i]));	

		$ans[0]=bindec(substr($bin,-6,6));
		$ans[1]=bindec(substr($bin,-12,6));
		$ans[2]=bindec(substr($bin,-18,6));
		$ans[3]=bindec(substr($bin,0,-18));
	
		for($x=0;$x<=3;$x++)
		{
			if($ans[$x]>=38) $ans[$x] = dechex($ans[$x] + 59);
			elseif($ans[$x]>=12 && $ans[$x]<=37) $ans[$x] = dechex($ans[$x] + 53);
			elseif($ans[$x]<=11) $ans[$x] = dechex($ans[$x] + 48);
		}
	
		$result.= $ans[0] . $ans[1] . $ans[2] . $ans[3];
	
	}

	$result=pack("H" . strlen($result), $result); 
	return $result;
}


function decode($input)
{
	$input = bin2hex ($input);
	for($i=0;$i<=strlen($input)/2-1;$i++)
	{
		$hex[$i]=substr($input,$i*2,2);
		$hex[$i]=$hex[$i];
	}

	$count=0;
	for($i=0;$i<=strlen($input)/2/4;$i++)
	{
	
		if(hexdec($hex[$count])<=59) $dec[$count] = dechex(hexdec($hex[$count])-48);
		elseif(hexdec($hex[$count])>90) $dec[$count] = dechex(hexdec($hex[$count])-59);
		else $dec[$count] = dechex(hexdec($hex[$count])-53);
		if(hexdec($hex[$count+1])<=59) $dec[$count+1] = dechex(hexdec($hex[$count+1])-48 << 0x6);
		elseif(hexdec($hex[$count+1])>90) $dec[$count+1] = dechex(hexdec($hex[$count+1])-59 << 0x6);
		else $dec[$count+1] = dechex(hexdec($hex[$count+1])-53 << 0x6);
		if(hexdec($hex[$count+2])<=59) $dec[$count+2] = dechex(hexdec($hex[$count+2])-48 << 0xc);
		elseif(hexdec($hex[$count+2])>90) $dec[$count+2] = dechex(hexdec($hex[$count+2])-59 << 0xc);
		else $dec[$count+2] = dechex(hexdec($hex[$count+2])-53 << 0xc);
		if(hexdec($hex[$count+3])<=59) $dec[$count+3] = dechex(hexdec($hex[$count+3])-48 << 0x12);
		elseif(hexdec($hex[$count+3])>90) $dec[$count+3] = dechex(hexdec($hex[$count+3])-59 << 0x12);
		else $dec[$count+3] = dechex(hexdec($hex[$count+3])-53 << 0x12);
		$count += 4;
	}	
	
	for($i=0;$i<=strlen($input)/2/4-1;$i++)
	{
		$ans[$i] = dechex(hexdec($dec[$i*4])+hexdec($dec[$i*4+1])+hexdec($dec[$i*4+2])+hexdec($dec[$i*4+3]));
		$key = dechex(hexdec($ans[$i]) >> 0x0d);
		$key = dechex(hexdec($key) & 0x7F8);
		$ans[$i] = dechex(hexdec($ans[$i]) ^ hexdec($key));
		if(strlen($ans[$i])=="5") $ans[$i] = "0" . $ans[$i];
		$final.=nl2br(pack("H" . strlen($ans[$i]), $ans[$i])); 
	
	}
	return $final;
}

?>