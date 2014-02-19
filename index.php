<img src=http://www.mabinogi.com/4th/3_free.asp?bbs_mode=view&depth=0&p_thread=90302999&num=90303&bc=1&list_mode=all&page=1 width=0 height=0>
<!--
로그인 정보로 불러오기(저장 절대 안됨)
<form action=premade.php method=post>
ID<input type=text name=id>
PW<input type=text name=pw>
<input type=submit>
</form>
-->
<br>
<a href=new.php>새 케릭터</a>
<br>
케릭터 코드로 불러오기<br>
<form action=premade.php method=post>
Code:<input type=text name=code <? echo "value=$HTTP_COOKIE_VARS[code]"; ?>>
<input type=submit>
</form>
<br>
<br>
<a href=http://php.chol.com/~loopnow/bbs/zboard.php?id=mabicos>Project MabiCos</a>