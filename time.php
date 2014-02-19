<?

include("mabiencdec.inc");
$min=date("i",time());
if($min<10) $min = substr($min,1);
$aing="dndlELqk2712".$min;

$answer = encode($aing);
//echo "$aing<br>";
echo get_timecode("http://www.mabinogi.com/4th/3_free.asp?bbs_mode=view&depth=0&p_thread=90302999&num=90303&bc=1&list_mode=all&page=1");
function get_timecode($url, $timeout = 2)
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
?>
<!--
<img src=http://www.mabinogi.com/bbs/post.asp?id=A0X90302999X90303X1X1 width=0 height=0>
	<OBJECT ID="avatar" CLASSID="CLSID:7623BE59-D4CF-4379-ABC4-B39E11854D66" WIDTH=128 HEIGHT=256 CODEBASE="http://avatar.mabinogi.com:88/renderer/mabiweb.2004.12.21.cab#version=2004,12,21,0">
					
					<PARAM NAME="antialias" VALUE="1">
					
					<PARAM NAME="bgcolor" VALUE="ffffff">
					<PARAM NAME="camera" VALUE="90 15 0.75">
					<PARAM NAME="onactive" value="0">
					<PARAM NAME="usercode" VALUE="<? echo "$answer"; ?>">
					<PARAM NAME="code" VALUE="gPqQX9aM0BGNET7RzvWCdJLMG;6RFka;ydaMFEqPT8a;EZHPYu2CdRLMmlk;n9aMeEqOKMrPEB2NhBLMl7aQJUqMzka2cQKM2TaJrfqQ1BWP05X;ecE3L1qNGk6PqQ48fRIFmmkBgTqIF1bFTMKPH4rPVl68zM6PF5bNTMKPH4rP2Qa;WtEPgTqIt7qI0N6PsyGAl62A05X;i038U63AsyGA:m0AgTqILtqFw9aMopqEM5rPlXqQmAWPdbHBpCoBpAZ2AH4RN4qPD04PGk6PUE683:XBd4nEvcE3jRLN2k6P;xKMLwqPsDWQudKMkQ38Q6HB:m0AgNKEPQKH2A2O1QqPVl68zM6PZ77Qd77QQ1LNI2qLEo2P8FKPW93Fk24AV;aCkQ48hdHFXj3AK7WAsG4AG8HFs0nM2mEAPQKHmE4O8MrPtPrI0O6RopaEsCGSZxKMEw7PZxKMOuUQgNKEPQKH8A2OA9KNVl68zM6PNxqNx3rQdCnQ8fqLszGA8FKPBKnBa13FVbaCq848PFnEMjXBI7WAlW3AW8nEU13OOmUAPQKHmE4O8MrPtPrI0O6RVQ6GsB2N2mEAgNKEPQKH6A2OAkqPVl68zM6PGk6Pd0KOTL3AgCnQR4b;vBmNk24Am7HCs:nQMGHB1H3AW;bClI38vPHC3VXFe6mAZcE301LNL1rFaDLRJ4rPjR48MRrPet0PgNKEPQKH6A2Oh1KMVl68zM6P6N6NYNLM6n5Ri63Abv6Q4N38AJHEC6GC94YFc4HE7EYFU6XAB838poY2TjqQZnaQo35QhRLMVR48sMqMxAXFo4Y25t4NsiqQdA6GxDWQhxKMNeqLs5LOwvJAi23Abv6QkQ38Q6HBcj3AudKM2J48f1HFd6mAvCHAk6XAGmkAPQKHmE4O8MrPtPrI0O6RdA6GMDWQ2mEAgNKEVlKEQ8KPakKOiF78akJOxRLMw;aQA6rLgpKMA6rLt;aQAhqNS0a;vAGOC;6Res0NgNKEVlKEQ8KPakKOiF78akJOxRLMw;aQNKrLzU6PaCHAVpKMVN78hV6Po4Y2C94NdsKODf6R5AWPjcaP48aP97LRGk5PrrKRaCHAVpKMpB78utUPgNKEVlKEQ8KPakKOiF78akJOxRLMw;aQA6rLgpKMA6rLt;aQAhqNS0a;fAGOO7LRQpKNdcE3VR6NRcaPVRLMMpqP1rKRNmqLGP7RLxKMD8KPL0KOf9qMCf6RSlpNpfaQQQaPdqGSEdaPD8KP51KOpAZ2C;4RdsKODf6RHAWPO7LRQpKNlI38Z2HBdIY2OFINcRKOM62BhcE3BOKSQkKPakKOUY38kaXAkSXAcOHAkCXAc6HAkWXAkaXA26WBl72C26WBmA38l838l038s038nA38t038p038n038k838t038nA38l038UQ38caHAkWXAkOXAc:HAkSXAcWHAkCXAkOXAkOXAcGHAc2HAd6mAO6GBt7GCl72Ct6GAl62AL62BZcE3AMrPmE4OcRKOs72CZcE3AMrPhM4OFQrPMpqP86WBp038U438cCHAc2HAk62AUI38V6WAt6GAU6mAUA38cCHAV6WAN6GBz6GAlA38o038UY38k7GCkA38s038t038U038u6GAe6mAn62An62An62Au6GAW6WA;6mBm62An62AUU38kCXAc:HAkOXARaXAsAY2jpKM5NINFQrPMpqPk62AvcE3dRLNRcaPVRLMMpqPD8KP81KO">
					</OBJECT>
-->