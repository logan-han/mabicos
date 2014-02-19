<?
include("mabiencdec.inc");
include("func.inc");

if(!$code) exit;
setcookie("code",$code,time()+604800);
	$code = decode($code);
	$code = strstr($code,"load ");
	$code = substr($code,5,strpos($code,".txt")-1);

/*
$fp = fopen($code,"r");
if(!$fp) echo "ErroR";
else while(!feof($fp)) $str.=fgets($fp,1024);
fclose($fp);
*/
$str = get_all($code);
$filebase = "http://avatar.mabinogi.com:88/data/";
$background = "paperback";
$version = "1.00";
if(!$bgcolor) $bgcolor = "F6EEC7";

$framework = cutter($str,"SetFramework ","\n");
//성별
if(eregi('female',$framework)) $sex="f";
else $sex="m";
$scale = cutter($str,"SetScale ","\r\n");

$skincolor = cutter($str,"SetGlobalColor skin ","");
$eyecolor = cutter($str,"SetGlobalColor e ","\r\n");
$haircolor = cutter($str,"SetGlobalColor hair ","\r\n");

$eyegrid = cutter($str,"EyeGrid ","\r\n");
$eyeemotion = cutter($str,"EyeEmotion ","\r\n");
$mouthgrid = cutter($str,"MouthGrid ","\r\n");
$mouthemotion = cutter($str,"MouthEmotion ","\r\n");

//female_lightleather_bss.pmg 354F30:c1 FFFFFF:c2 E1F2D8:c3 1
$temp = explode(" ",cutter($str,"AddMesh Body "));
$body = $temp[0];
$bodycolor1 = substr($temp[1],0,6);
$bodycolor2 = substr($temp[2],0,6);
$bodycolor3 = substr($temp[3],0,6);

$temp = explode(" ",cutter($str,"AddMesh Hand "));
$hand = $temp[0];
$handcolor1 = substr($temp[1],0,6);
$handcolor2 = substr($temp[2],0,6);
$handcolor3 = substr($temp[3],0,6);

$temp = explode(" ",cutter($str,"AddMesh Foot "));
$foot = $temp[0];
$footcolor1 = substr($temp[1],0,6);
$footcolor2 = substr($temp[2],0,6);
$footcolor3 = substr($temp[3],0,6);

$temp = explode(" ",cutter($str,"AddMesh Face "));
$face = $temp[0];
$facecolor1 = substr($temp[1],0,6);
$facecolor2 = substr($temp[2],0,6);
$facecolor3 = substr($temp[3],0,6);

$temp = explode(" ",cutter($str,"AddMesh Hair "));
$hair = $temp[0];
$haircolor1 = substr($temp[1],0,6);
$haircolor2 = substr($temp[2],0,6);
$haircolor3 = substr($temp[3],0,6);

//무뇌중이 되는현상을 없에기위한 처리가 필요
/*
$temp = explode(" ",cutter($str,"AddMesh Head "));
$head = $temp[0];
$headcolor1 = substr($temp[1],0,6);
$headcolor2 = substr($temp[2],0,6);
$headcolor3 = substr($temp[3],0,6);
*/
$head = "none";
$headcolor1 = "000000";
$headcolor2 = "000000";
$headcolor3 = "000000";

//출력부
$output="setbase $filebase\r\n";
$output.="background $background\r\n";
$output.="load Version $version\n";
$output.="Bgcolor $bgcolor\r\n";
$output.="SetFramework $framework\r\n";
$output.="SetScale $scale\r\n";
$output.="SetGlobalColor skin $skincolor\r\n";
$output.="SetGlobalColor e $eyecolor\r\n";
$output.="SetGlobalColor hair $haircolor\r\n";
$output.="EyeGrid $eyegrid\r\n";
$output.="EyeEmotion $eyeemotion\r\n";
$output.="MouthGrid $mouthgrid\r\n";
$output.="MouthEmotion $mouthemotion\r\n";
$output.="ChangeEmotion $emotion\r\n";
$output.="AddMesh Body $body $bodycolor1:c1 $bodycolor2:c2 $bodycolor3:c3 1\r\n";
$output.="MeshGroupState Body palml|palmr\r\n";
if($head!="none") $output.="AddMesh Head $head $headcolor1:h1 $headcolor2:h2 $headcolor3:h3 2\r\nMeshGroupState Head X1\r\n";
$output.="AddMesh Hand $hand $handcolor1:g1 $handcolor2:g2 $handcolor3:g3 2\r\n";
$output.="MeshGroupState Hand palml|palmr\r\n";
$output.="MeshGroupNorm Hand S\r\n";
$output.="AddMesh Foot $foot $footcolor1:s1 $footcolor2:s2 $footcolor3:s3 2\r\n";
$output.="MeshGroupNorm Foot M\r\n";
$output.="AddMesh Face $face $facecolor1 $facecolor2 $facecolor3 3\r\n";
$output.="MeshGroupState Face F1\r\n";
$output.="AddMesh Hair $hair $haircolor1:hair $haircolor2 $haircolor3 3\r\n";
if($head!="none") $output.="MeshGroupState Hair H2\r\n";
else $output.="MeshGroupState Hair H1\r\n";
//$output.="AddMesh WeaponFirst $weapon1 $weapon1color1:tr1b $weapon1color2:tr2b $weapon1color3:tr3b 3\r\n";
//$output.="MeshGroupState WeaponFirst R\r\n";
//$output.="AddMesh WeaponSecond $weapon2 $weapon2color1:tb1a $weapon2color2:tb2a $weapon2color3:tb3a 4\r\n";
//$output.="MeshGroupState WeaponSecond E\r\n";
//미리보기 이므로 무조건 walk
$output.="AddAnimation uni_natural_walk_12.ani walk\r\n";
$output.="SetAnimation walk\r\n";
$output.="ChangeEmotion 0 0\r\n";
//echo $output;
$output=encode($output);
$usercode = encode(get_timecode("http://www.mabinogi.com/4th/3_free.asp?bbs_mode=view&depth=0&p_thread=90302999&num=90303&bc=1&list_mode=all&page=1"));
print <<<END
<img src=http://www.mabinogi.com/4th/3_free.asp?bbs_mode=view&depth=0&p_thread=90302999&num=90303&bc=1&list_mode=all&page=1 width=0 height=0>
				<OBJECT ID="avatar" CLASSID="CLSID:7623BE59-D4CF-4379-ABC4-B39E11854D66" WIDTH=128 HEIGHT=256 CODEBASE="http://avatar.mabinogi.com:88/renderer/mabiweb.2004.12.21.cab#version=2004,12,21,0">
					   
						 <PARAM NAME="antialias" VALUE="1">					   
					   <PARAM NAME="bgcolor" VALUE="f2f2f4">
					   <PARAM NAME="camera" VALUE="90 15 0.75">
					   <PARAM NAME="onactive" value="0">
END;
echo "<PARAM NAME=\"usercode\" VALUE=\"$usercode\">";
echo "<PARAM NAME=\"code\" VALUE=\"$output\"></OBJECT>";

?>
<form name=aing action=new.php method=post>
<input type=hidden name=sex <? if($sex) echo "value=$sex" ?>>
<input type=hidden name=bgcolor <? if($bgcolor) echo "value=$bgcolor" ?>>
<input type=hidden name=face <? if($face) echo "value=$face" ?>>
<input type=hidden name=facecolor1 <? if($facecolor1) echo "value=$facecolor1" ?>>
<input type=hidden name=facecolor2 <? if($facecolor2) echo "value=$facecolor2" ?>>
<input type=hidden name=facecolor3 <? if($facecolor3) echo "value=$facecolor3" ?>>
<input type=hidden name=skincolor <? if($skincolor) echo "value=$skincolor" ?>>
<input type=hidden name=eyecolor <? if($eyecolor) echo "value=$eyecolor" ?>>
<input type=hidden name=eyegrid <? if($eyegrid) echo "value=\"$eyegrid\"" ?>>
<input type=hidden name=eyeemotion <? if($eyeemotion) echo "value=\"$eyeemotion\"" ?>>
<input type=hidden name=mouthgrid <? if($mouthgrid) echo "value=\"$mouthgrid\"" ?>>
<input type=hidden name=mouthemotion <? if($mouthemotion) echo "value=\"$mouthemotion\"" ?>>
<input type=hidden name=body <? if($body) echo "value=$body" ?>>
<input type=hidden name=bodycolor1 <? if($bodycolor1) echo "value=$bodycolor1" ?>>
<input type=hidden name=bodycolor2 <? if($bodycolor2) echo "value=$bodycolor2" ?>>
<input type=hidden name=bodycolor3 <? if($bodycolor3) echo "value=$bodycolor3" ?>>
<input type=hidden name=hand <? if($hand) echo "value=$hand" ?>>
<input type=hidden name=handcolor1 <? if($handcolor1) echo "value=$handcolor1" ?>>
<input type=hidden name=handcolor2 <? if($handcolor2) echo "value=$handcolor2" ?>>
<input type=hidden name=handcolor3 <? if($handcolor3) echo "value=$handcolor3" ?>>
<input type=hidden name=foot <? if($foot) echo "value=$foot" ?>>
<input type=hidden name=footcolor1 <? if($footcolor1) echo "value=$footcolor1" ?>>
<input type=hidden name=footcolor2 <? if($footcolor2) echo "value=$footcolor2" ?>>
<input type=hidden name=footcolor3 <? if($footcolor3) echo "value=$footcolor3" ?>>
<input type=hidden name=head <? if($head) echo "value=$head" ?>>
<input type=hidden name=headcolor1 <? if($headcolor1) echo "value=$headcolor1" ?>>
<input type=hidden name=headcolor2 <? if($headcolor2) echo "value=$headcolor2" ?>>
<input type=hidden name=headcolor3 <? if($headcolor3) echo "value=$headcolor3" ?>>
<input type=hidden name=hair <? if($hair) echo "value=$hair" ?>>
<input type=hidden name=haircolor1 <? if($haircolor1) echo "value=$haircolor1" ?>>
<input type=hidden name=haircolor2 <? if($haircolor2) echo "value=$haircolor2" ?>>
<input type=hidden name=haircolor3 <? if($haircolor3) echo "value=$haircolor3" ?>>
<input type=submit value="이 케릭터를 선택">
</form>
제보용<br>
배경의색상<br>
bgcolor:<? if($bgcolor) echo "$bgcolor" ?><br>
<br>
얼굴<br>
face:<? if($face) echo "$face" ?><br>
<br>
얼굴의 색상<br>
facecolor1:<? if($facecolor1) echo "$facecolor1" ?><br>
facecolor2:<? if($facecolor2) echo "$facecolor2" ?><br>
facecolor3:<? if($facecolor3) echo "$facecolor3" ?><br>
<br>
피부의색<br>
skincolor:<? if($skincolor) echo "$skincolor" ?><br>
눈의 색<br>
eyecolor:<? if($eyecolor) echo "$eyecolor" ?><br>
<br>
눈<br>
eyegrid:<? if($eyegrid) echo "$eyegrid" ?><br>
eyeemotion:<? if($eyeemotion) echo "$eyeemotion" ?><br>
<br>
입<br>
mouthgrid:<? if($mouthgrid) echo "$mouthgrid" ?><br>
mouthemotion:<? if($mouthemotion) echo "$mouthemotion" ?><br>
<br>
옷<br>
body:<? if($body) echo "$body" ?><br>
<br>
옷의색상<br>
bodycolor1:<? if($bodycolor1) echo "$bodycolor1" ?><br>
bodycolor2:<? if($bodycolor2) echo "$bodycolor2" ?><br>
bodycolor3:<? if($bodycolor3) echo "$bodycolor3" ?><br>
<br>
장갑<br>
hand:<? if($hand) echo "$hand" ?><br>
<br>
장갑의색상<br>
handcolor1:<? if($handcolor1) echo "$handcolor1" ?><br>
handcolor2:<? if($handcolor2) echo "$handcolor2" ?><br>
handcolor3:<? if($handcolor3) echo "$handcolor3" ?><br>
<br>
신발<br>
foot:<? if($foot) echo "$foot" ?><br>
<br>
신발의색상<br>
footcolor1:<? if($footcolor1) echo "$footcolor1" ?><br>
footcolor2:<? if($footcolor2) echo "$footcolor2" ?><br>
footcolor3:<? if($footcolor3) echo "$footcolor3" ?><br>
<br>
모자(미완성)<br>
head:<? if($head) echo "$head" ?><br>
<br>
모자의색상<br>
headcolor1:<? if($headcolor1) echo "$headcolor1" ?><br>
headcolor2:<? if($headcolor2) echo "$headcolor2" ?><br>
headcolor3:<? if($headcolor3) echo "$headcolor3" ?><br>
<br>
머리<br>
hair:<? if($hair) echo "$hair" ?><br>
<br>
머리의색상<br>
haircolor1:<? if($haircolor1) echo "$haircolor1" ?><br>
haircolor2:<? if($haircolor2) echo "$haircolor2" ?><br>
haircolor3:<? if($haircolor3) echo "$haircolor3" ?><br>