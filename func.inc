<?
function get_timecode($url, $timeout = 5)
{
   $url = parse_url($url);

   if(!in_array($url['scheme'],array('','http')))
       return;

   $fp = fsockopen ($url['host'], ($url['port'] > 0 ? $url['port'] : 80), $errno, $errstr, $timeout);
   if (!$fp)
   {
       return;
       // echo "$errstr ($errno)<br>\n";
   }
   else
   {
       fputs ($fp, "GET /".$url['path'].($url['query'] ? '?'.$url['query'] : '')." HTTP/1.0\r\nHost: ".$url['host']."\r\n\r\n");
       $d = '';
       while (!feof($fp))
       {
     $d .= fgets ($fp,2048);
		//		echo fgets($fp,2048);
        if(preg_match("/usercode=(.*);/i", $d, $m))
		               break;
       }
       fclose ($fp);
		$m = substr($m[1],0,strpos($m[1],';'));
	   return $m;
   }
}
function get_all($url, $timeout = 5)
{
   $url = parse_url($url);

   if(!in_array($url['scheme'],array('','http')))
       return;

   $fp = fsockopen ($url['host'], ($url['port'] > 0 ? $url['port'] : 80), $errno, $errstr, $timeout);
   if (!$fp)
   {
       return;
       // echo "$errstr ($errno)<br>\n";
   }
   else
   {
       fputs ($fp, "GET /".$url['path'].($url['query'] ? '?'.$url['query'] : '')." HTTP/1.0\r\nHost: ".$url['host']."\r\n\r\n");
       $d = '';
       while (!feof($fp))
       {
     $d .= fgets ($fp,2048);
       }
       fclose ($fp);
	   return $d;
   }
}

function filetolist($filename)
{
	global $animation,$body,$hand,$foot,$face,$head,$emotion;
	$targetfile=file("$filename.dat");
	$max=count($targetfile)-1;	
	for($i=0;$i<=$max;$i++)
	{
	//전회의 입력값 처리에 대해 변수가 변수명이 되는법을 모르니;

		$data=explode("|",$targetfile[$i]);
		if($data[0]==$emotion || $data[0]==$animation || $data[0]==$body || $data[0]==$hand || $data[0]==$foot || $data[0]==$face || $data[0]==$head) $result.="<option value='$data[0]' selected>$data[1]</option>\r\n";
		else $result.="<option value='$data[0]'>$data[1]</option>\r\n";
	}
	return $result;
}

function cutter($msg,$start)
{
	$output = strstr($msg,$start);
	$output = explode("\n",substr($output,strlen($start)));
	//echo strlen($end) . "\n<Br>";
	return $output[0];
}
function cutter2($msg,$start,$end)
{
	$output = strstr($msg,$start);
	$output = substr($output,strlen($start),strpos($output,$end));
	$output = strip_tags($output);
	//echo strlen($end) . "\n<Br>";
	return $output;
}
?>