
<form>

<p>ENTER USER NAME :

  <input type="text" name="text2">

</p>

<p> ENTER PASSWORD :

<input type="password" name="text1">

  <input type="button" value="Check In" name="Submit" onclick=javascript:validate(text2.value,"free",text1.value,"javascript") >

</p>

 

</form>

<script language = "javascript">
 

function validate(text1,text2,text3,text4)

{

 if (text1==text2 && text3==text4)

 load('success.htm');

 else

 {

  load('failure.htm');

 }

}

function load(url)

{

 location.href=url;

}

</script>

 

<p align="center"><font face="arial" size="-2">This free script provided by <a href="../scheduling2/index2.php">JavaScript Kit</a></font></p>

 