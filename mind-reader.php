<?php
/*
Plugin Name: Mind machine
Plugin URI: http://www.xyz.com
Description: Wordpress plugin mind
Author: Aman
Version: 1.0.1
Author URI: http://xyz.com
*/
$siteurl = get_option('siteurl');
define('MIND_READER_FOLDER', dirname(plugin_basename(__FILE__)));
define('MIND_READER_URL', $siteurl.'/wp-content/plugins/' . MIND_READER_FOLDER);
define('MIND_READER_FILE_PATH', dirname(__FILE__));
define('MIND_READER_DIR_NAME', basename(MIND_READER_FILE_PATH));

register_activation_hook(__FILE__,'mind_install');
register_deactivation_hook(__FILE__ , 'mind_uninstall' );
register_uninstall_hook(__FILE__ , 'mind_delete');
function mind_install()
{
    
}
function mind_uninstall()
{
    
}
function mind_delete()
{
  unlink(MIND_READER_FOLDER);
}
add_action('admin_menu','mind_reader_admin_menu');

function mind_reader_admin_menu() { 
	add_menu_page(
		"mind_reader",
		"Mind Machine",
		8,
		__FILE__,
		"mind_admin_menu_list",
		MIND_READER_URL."/mind.jpg"
	); 
	//add_submenu_page(__FILE__,'olypics','Site list','8','list-site','oly_admin_list_site');
           
}
function mind_admin_menu_list()
{
	echo "put [min_reader_machine] shortcode on page for madel tally<br>";
        echo "alse use widget  for madel tally<br>";
}
//Add ShortCode for "front end listing"
add_shortcode("min_reader_machine","mind_site_listing_shortcode");
function mind_site_listing_shortcode($atts) 
{ 
?>
<STYLE type=text/css>
.mntd {
	FONT-SIZE: 10px; COLOR: #7a1239; FONT-FAMILY: verdana; BACKGROUND-COLOR: #ffffff;font-wieght:bold;
}
.symtd {
	FONT-SIZE: 17px; COLOR: #000000; FONT-FAMILY: wingdings; BACKGROUND-COLOR: #d79ec6
}
.symtd1 {
	FONT-SIZE: 35px; COLOR: #000000; FONT-FAMILY: wingdings; BACKGROUND-COLOR: #cccccc; align: center;width:100px;height:100px;
}
.numtd {
	FONT-SIZE: 17px; COLOR: #7a1239; FONT-FAMILY: verdana; BACKGROUND-COLOR: #aaaaaa;
}
.mind { width:600px;  }

.mycolor { COLOR:#7A1239;}
 
#content tr td {
    border-top: 1px solid #E7E7E7;
    padding: 6px 4px;
}
.result {  font-size: 40px;
    margin-top: 34px; }
</STYLE>

<SCRIPT language=javascript>
var ax=0;
function writeTable() {
       
	ax=Math.round(Math.random()*26);
	alphaArray=new Array("a", "n", "b", "d", "f", "h", "{", "i", "l", "v", "x", "z", "I", "J", "M", "N", "o", "O", "R", "S", "T", "U", "m", "6", "^", "u", "_", "[", "]")
	table="<table border=0 cellspacing=1 cellpadding=1 ><tr>"
	j=1;
	for ( i = 99 ; i >= 0 ; i-- ) {
		a=Math.round(Math.random()*26);
		if ( i%9 == 0 &&  i < 89 )
			a=ax;
		table+="<td class='numtd'>"+i+"</td><td class='symtd'>"+alphaArray[a]+"</td>"
		if ( j%10 == 0 )
			table+="</tr><tr>"
		j++
	}
	table+="</table>"
        var sym = document.getElementById('sym');
        var sh = document.getElementById('sh');
	sym.innerHTML=table
	sh.innerHTML=""
	sh1.innerHTML="" 
	document.getElementById('sh1').style.display="block";
	document.getElementById('sh').style.display="none"; 
      
}
function showAnswer() {
         var sym = document.getElementById('sym');
        var sh = document.getElementById('sh');
		document.getElementById('sh1').style.display="none";
		document.getElementById('sh').style.display="block"; 
	sh.innerHTML='<div class="result">'+alphaArray[ax]+'</div>';
	sym.innerHTML="<h1><a href='javascript:writeTable()'>Again</a></h1>"
}
</SCRIPT>

<script>  
window.onload=function(){
  writeTable()
}
</script>
<div class="mind">
<CENTER><B><U><FONT face=arial size=5 class="mycolor">Mind Machine </FONT></U></B><BR></CENTER>


        <UL type=circle>
        <LI class="mycolor">Think of a number with 2 digits (ex: 96) <BR></LI>
        <LI class="mycolor">Subtract from this number its 2 digits (96 - 9 -6 = 81 ) <BR></LI>
        <LI class="mycolor">Find the symbol that corresponds to this number<BR></LI>
        <LI class="mycolor"><B>Concentrate</B> on the symbol and click on the magic square...<BR></LI>
		</UL>
       
      <CENTER> 
	  <div  id='sh1' style="border:6px solid gray;width:100px;height:100px;" onclick=showAnswer() >
	  </div> </CENTER>  
	  <CENTER> 
	  <div  id='sh' style="display:none;border:6px solid gray;width:100px;height:100px;" onclick=showAnswer() >
	  </div> </CENTER>   
	  
      <div id=sym vAlign=center align=middle width="600"></div>
<?php
}



?>
