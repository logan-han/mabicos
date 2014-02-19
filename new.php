<?
include("mabiencdec.inc");
include("func.inc");
if(!$sex) $sex="f";
?>
<script>
 function preset_body(what) 
    {
		document.aing.body.value=what;
	}
 function preset_hand(what) 
    {
		document.aing.hand.value=what;
	}
 function preset_foot(what) 
    {
		document.aing.foot.value=what;
	}
 function preset_head(what) 
    {
		document.aing.head.value=what;
	}
function preset_hair(what) 
    {
		document.aing.hair.value=what;
	}
</script>
<form name=aing method=post>
나이
<select name=age>
<option value='11' <? if($age=="11") echo "selected"; ?>>11</option>
<option value='15' <? if($age=="15") echo "selected"; ?>>15</option>
<option value='20' <? if($age=="20") echo "selected"; ?>>20</option></select>
<br>
성별
<select name=sex>
<option value='m' <? if($sex=="m") echo "selected"; ?>>남자</option>
<option value='f' <? if($sex=="f") echo "selected"; ?>>여자</option></select>
<br>
배경의색상
<input type=text name=bgcolor <? if($bgcolor) echo "value=$bgcolor" ?> maxlength=8 size=8>
<br>
얼굴
<input type=text name=face <? if($face) echo "value=$face" ?> size=30>
<br>
얼굴의 색상
<input type=text name=facecolor1 <? if($facecolor1) echo "value=$facecolor1" ?> maxlength=8 size=8>
<input type=text name=facecolor2 <? if($facecolor2) echo "value=$facecolor2" ?> maxlength=8 size=8>
<input type=text name=facecolor3 <? if($facecolor3) echo "value=$facecolor3" ?> maxlength=8 size=8>
<br>
피부의색
<input type=text name=skincolor <? if($skincolor) echo "value=$skincolor" ?> size=8>
눈의 색
<input type=text name=eyecolor <? if($eyecolor) echo "value=$eyecolor" ?> size=8>
<br>
눈
<input type=text name=eyegrid <? if($eyegrid) echo "value=\"$eyegrid\"" ?> size=8>
<input type=text name=eyeemotion <? if($eyeemotion) echo "value=\"$eyeemotion\"" ?> size=30>
<br>
입
<input type=text name=mouthgrid <? if($mouthgrid) echo "value=\"$mouthgrid\"" ?> size=8>
<input type=text name=mouthemotion <? if($mouthemotion) echo "value=\"$mouthemotion\"" ?> size=30>
<br>
옷
<input type=text name=body <? if($body) echo "value=$body"; ?> size=30>
 <select name='body_list' onChange="preset_body(this.value)">
<? echo filetolist("body"); ?>
</select>
<br>
옷의색상
<input type=text name=bodycolor1 <? if($bodycolor1) echo "value=$bodycolor1" ?> maxlength=8 size=8>
<input type=text name=bodycolor2 <? if($bodycolor2) echo "value=$bodycolor2" ?> maxlength=8 size=8>
<input type=text name=bodycolor3 <? if($bodycolor3) echo "value=$bodycolor3" ?> maxlength=8 size=8>
<br>
장갑
<input type=text name=hand <? if($hand) echo "value=$hand"; ?> size=30>
 <select name='hand_list' onChange="preset_hand(this.value)">
<? echo filetolist("hand"); ?>
</select>
<br>
장갑의색상
<input type=text name=handcolor1 <? if($handcolor1) echo "value=$handcolor1" ?> maxlength=8 size=8>
<input type=text name=handcolor2 <? if($handcolor2) echo "value=$handcolor2" ?> maxlength=8 size=8>
<input type=text name=handcolor3 <? if($handcolor3) echo "value=$handcolor3" ?> maxlength=8 size=8>
<br>
신발
<input type=text name=foot <? if($foot) echo "value=$foot"; ?> size=30>
 <select name='foot_list' onChange="preset_foot(this.value)">
<? echo filetolist("foot"); ?>
</select>
<br>
신발의색상
<input type=text name=footcolor1 <? if($footcolor1) echo "value=$footcolor1" ?> maxlength=8 size=8>
<input type=text name=footcolor2 <? if($footcolor2) echo "value=$footcolor2" ?> maxlength=8 size=8>
<input type=text name=footcolor3 <? if($footcolor3) echo "value=$footcolor3" ?> maxlength=8 size=8>
<br>
모자
<input type=text name=head <? if($head) echo "value=$head"; ?> size=30>
 <select name='head_list' onChange="preset_head(this.value)">
<? echo filetolist("head"); ?>
</select>
<br>
모자의색상
<input type=text name=headcolor1 <? if($headcolor1) echo "value=$headcolor1" ?> maxlength=8 size=8>
<input type=text name=headcolor2 <? if($headcolor2) echo "value=$headcolor2" ?> maxlength=8 size=8>
<input type=text name=headcolor3 <? if($headcolor3) echo "value=$headcolor3" ?> maxlength=8 size=8>
<br>
머리
<input type=text name=hair <? if($hair) echo "value=$hair" ?> size=20>
 <select name='hair_list' onChange="preset_hair(this.value)">
<? echo filetolist("hair"); ?>
</select>
<br>
머리의색상
<input type=text name=haircolor1 <? if($haircolor1) echo "value=$haircolor1" ?> maxlength=8 size=8>
<input type=text name=haircolor2 <? if($haircolor2) echo "value=$haircolor2" ?> maxlength=8 size=8>
<input type=text name=haircolor3 <? if($haircolor3) echo "value=$haircolor3" ?> maxlength=8 size=8>
<br>
 동작
 <select name='animation'>
<? echo filetolist("animation"); ?>
</select>
<br>
표정
 <select name='emotion'>
<? echo filetolist("emotion"); ?>
</select>
<br>
<input type=submit>
</form>
<?
$filebase = "http://avatar.mabinogi.com:88/data/";
$background = "paperback";
$version = "1.00";
if(!$bgcolor) $bgcolor = "F6EEC7";

if($sex=="f") $framework = "female_framework.frm";
else $framework = "male_framework.frm";
/*
SetScale 0.14 1.55 1.60 1.50 11살
SetScale 0.29 1.08 1.06 1.06 12살
*/
if($age=="20") $scale = "1.00 1.00 1.00 1.00";
if($age=="15") $scale = "0.71 0.80 0.70 0.70";
if($age=="11") $scale = "0.14 1.55 1.60 1.50";
else $scale = "1.00 1.00 1.00 1.00"; //default

if(!$skincolor) $skincolor = "B58A7B";
if(!$eyecolor) $eyecolor = "000000";
//if(!$haircolor) $haircolor = "402020";

if(!$eyegrid) $eyegrid = "4 8";
if(!$eyeemotion) $eyeemotion = "16 28 26 16 22 10 29 28 6 28 16 2 22 31 11 18 23 19 15 13 30 19 23 11 6 18 29 27 13 26 19 22 27 27 15 11 3 15 29 18 11 10 14 7";
if(!$mouthgrid) $mouthgrid = "8 8";
if(!$mouthemotion) $mouthemotion = "0 8 15 0 12 11 0 0 4 2 11 13 8 2 12 2 15 11 7 21 14 8 9 8 20 18 19 1 1 23 20 30 30 31 22 27 30 20 3 9 22 13 27 28";

if(!$emotion) $emotion = "0";

if(!$body) $body = "male_newbie02_bsm.pmg";
if(!$bodycolor1) $bodycolor1 = "AC957E";
if(!$bodycolor2) $bodycolor2 = "FFE6D6";
if(!$bodycolor3) $bodycolor3 = "293960";

if(!$hand) $hand = "male_lorica01_g02.pmg";
if(!$handcolor1) $handcolor1 = "A06318";
if(!$handcolor2) $handcolor2 = "6D6F4B";
if(!$handcolor3) $handcolor3 = "F19C3D";

if(!$foot) $foot = "male_normal_s02.pmg";
if(!$footcolor1) $footcolor1 = "4F548D";
if(!$footcolor2) $footcolor2 = "904959";
if(!$footcolor3) $footcolor3 = "4F548D";

if(!$face) $face = "male_default_f00.pmg";
if(!$facecolor1) $facecolor1 = "4B4B4B";
if(!$facecolor2) $facecolor2 = "F7941D";
if(!$facecolor3) $facecolor3 = "A0927D";

if(!$hair) $hair = "male_hair06_t06.pmg";
if(!$haircolor1) $haircolor1 = "402020";
if(!$haircolor2) $haircolor2 = "DBE2C3";
if(!$haircolor3) $haircolor3 = "11239C";
if(!$head) $head = "none";
if(!$headcolor1) $headcolor1 = "000000";
if(!$headcolor2) $headcolor2 = "000000";
if(!$headcolor3) $headcolor3 = "000000";
/*
$weapon1
$weapon1color1
$weapon1color2
$weapon1color3

$weapon2
$weapon2color1
$weapon2color2
$weapon2color3

$shield1
$shield1color1
$shield1color2
$shield1color3

$shield2
$shield2color1
$shield2color2
$shield2color3
*/

$output="setbase $filebase\r\n";
$output.="background $background\r\n";
$output.="load Version $version\n";
$output.="Bgcolor $bgcolor\r\n";
$output.="SetFramework $framework\r\n";
$output.="SetScale $scale\r\n";
$output.="SetGlobalColor skin $skincolor\r\n";
$output.="SetGlobalColor e $eyecolor\r\n";
//$output.="SetGlobalColor hair $haircolor\r\n";
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
if(!$animation) $animation="walk";
	$targetfile=file("animation.dat");
	$max=count($targetfile)-1;	
	for($i=0;$i<=$max;$i++)
	{
		$data=explode("|",$targetfile[$i]);
		if($animation=="$data[0]") $output.="AddAnimation $data[2] $data[0]\r\n";
	}
$output.="SetAnimation $animation\r\n";
$output.="ChangeEmotion $emotion $emotion\r\n";
$output=encode($output);
/*
$min=date("i",time());
if($min<10) $min = substr($min,1);
$aing="dndlELqk2712".$min;
$usercode = encode($aing);
*/
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