<?php echo '<?xml version="1.0" encoding="ISO-8859-1" ?>';?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Foolish Games : A Jewel Fan Site</title>
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta name="keywords" content="Jewel Kilcher, biography, downloads, lyrics, links, poetry" />
	<meta name="description" content="Jewel Kilcher site featuring a Biography, Lyrics, Downloads, and information about Jewel and her life." />
    <link rev="made" href="mailto:luke@foolishgames.com" />
	<link rel="alternate" type="application/rss+xml" href="news/feed.php" title="Foolish Games Jewel News RSS" />
	<link rel="stylesheet" type="text/css" media="all" href="../base.css" />
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script type="text/javascript">
// navigation menu

function navigate(dropdown)
{
    var myindex  = dropdown.selectedIndex
    var SelValue = dropdown.options[myindex].value
    window.location.href = SelValue;
    
    return true;
}
</script>
</head>

<body onload="MM_preloadImages('../images/pale_01.gif','../images/pale_02.gif', '../images/pale_03.gif', '../images/pale_04.gif', '../images/pale_05.gif' )">

<!-- Begin Logo -->
<div id="logo">
<img src="../images/fglogo.gif" alt="Foolish Games" />
</div>
<!-- End Logo -->
<!-- Begin Breadcrumbs -->
<div id="bread">
<img src="../images/globe.png" alt="Breadcrumb Navigation" width="18" height="18" />
<strong>Home</strong>
</div>
<!-- End Breadcrumbs -->


<!-- Begin Navigation Menu -->
<table id="Table_01" width="524" border="0" cellpadding="1" cellspacing="0">
	<tr>
		<td>
			<a href="index.php" onmouseout="MM_swapImgRestore()" 
			onmouseover="MM_swapImage('Menu1','','../images/pale_01.gif',1)"><img src="../images/menu_01.gif" alt="Home" name="Image6" width="85" height="35" id="Menu1" /></a></td>
		<td>
			<a href="bio/index.html" onmouseout="MM_swapImgRestore()"
			onmouseover="MM_swapImage('Menu2','','../images/pale_02.gif',1)"><img src="../images/menu_02.gif" alt="Biography" width="115" height="35" id="Menu2" /></a></td>
		<td>
			<a href="disc/index.html" onmouseout="MM_swapImgRestore()" 
			onmouseover="MM_swapImage('Menu3','','../images/pale_03.gif',1)"><img src="../images/menu_03.gif" alt="Discography" width="136" height="35" id="Menu3" /></a></td>
		<td>
			<a href="news/index.php" 
			onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Menu4','','../images/pale_04.gif',1)"><img src="../images/menu_04.gif" alt="News" width="88" height="35" id="Menu4" /></a></td>
		<td>
			<a href="pics/index.html" onmouseout="MM_swapImgRestore()" 
			onmouseover="MM_swapImage('Menu5','','../images/pale_05.gif',1)"><img src="../images/menu_05.gif" alt="Pictures" width="100" height="35" id="Menu5" /></a></td>
	</tr>
</table>
<!-- End Navigation Menu -->


<h1>foolish games</h1>

<div id="content">

<img src="../images/jewelroof.jpg" width="223" height="275" id="jewelfoto" alt="Picture: Jewel Kilcher" /> 
 
<h2>A Jewel Fan Site</h2>

 <p class="silver">     
    <strong>News</strong>
    </p>
    
    <ul style="list-style-type: circle;" onmouseover = "this.style.color = 'blue';" onmouseout = "this.style.color = 'black';">
   
<?php

include( '../scripts/dbinfo.php' );
   
$currentPage = $_SERVER["PHP_SELF"];

$conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );

/* check connection */
if (!$conn) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql = 'SELECT id, date, title FROM articles ORDER BY date DESC, id DESC LIMIT 0,5 ';


$result = mysqli_query( $conn, $sql );

if ($myrow = mysqli_fetch_array($result, MYSQLI_BOTH)) {

  do {
  
  echo '<li>';
  echo '<strong><a href="news/index#';
  echo $myrow["id"];
  echo '">';
  echo $myrow["title"];
  echo '</a></strong><br />';
  echo '<span class="newshead">';
  echo $myrow["date"];
  echo '</span>'; 
  echo '</li>';

  } while ($myrow = mysqli_fetch_array($result));

} else {

	echo "Sorry, no records were found!";	

}

mysqli_free_result($result);

/* close connection */
mysqli_close($conn);

?>  
	</ul>
	<p>
	<span style="float: left; width: 150px;"><a href="news/index" title="More News" style="font: 1.3em Arial, Helvetica, sans-serif; margin-left: .2in; color: black; text-decoration: none;">more news &gt;</a></span>
	
	<span style=""><img src="../images/feed.gif" alt="RSS News Feed" /> <a href="news/feed.php">Subscribe</a></span></p>
	
	<div id="mynav">
<form method="post" id="navmenu" action="" onsubmit="navigate(document.getElementById('url')); return false">
  <fieldset>
  <legend><label for="url">Navigate</label><br /></legend>
		<select name="url" id="url" size="1">
        	<option value="http://www.foolishgames.com/jewel/bio/index.html">Biography</option>
            <option value="http://www.foolishgames.com/jewel/disc/index.html">Discography</option>
			<option value="http://www.foolishgames.com/download/index">Downloads</option>
            <option value="http://www.foolishgames.com/email/index">E-mail</option>
            <option value="http://www.foolishgames.com/fanpoetry/index">Fan Poetry</option>
            <option value="http://www.foolishgames.com/jewel/links/index">Links</option>
			<option value="http://www.foolishgames.com/jewel/misc/index">Miscellaneous</option>
            <option value="http://www.foolishgames.com/jewel/news/index.php">News</option>
            <option value="http://www.foolishgames.com/jewel/pics/index.html">Pictures</option>
			<option value="http://www.foolishgames.com/jewel/poetry/index">Poetry</option>
			<option value="http://www.foolishgames.com/jewel/books/revealing_jewel/index.html">Revealing Jewel</option>
    	</select>
          
	<input type="submit" name="submit_nav" id="submit_nav" value="Go" />
	</fieldset>
  </form>
</div>


  <p style="text-indent: .3in; text-align: Justify; line-height: 1.5;"><span style="font-size: 1.5em;">J</span>ewel Kilcher is a bright and rising artist who hit the scene back in 1995 with her debut release
      Pieces of You. Since then she has proven her exceptional ability and has gained respect among the 
      music community. To learn more about this amazing artist, please read the <a href="bio/index.html" title="Jewel Biography by Lucas Holt">Biography.</a>
    </p> 
    
    <p>Learn about Jewel's book, <a href="books/revealing_jewel/index.html">Revealing Jewel</a>.</p>
	
	<ul>
	  <li><a href="../luke/stp.html">Stone Temple Pilots: Thank You review</a> </li>
	  <li><a href="../luke/dido.html" class="smalltext">Dido: life for rent, a review</a></li>
	  <li><a href="news/review_sessions.html" class="smalltext">Sessions@AOL, a review </a></li>
	  <li><a href="news/chart.html" class="smalltext">Chart Positions</a></li>
	</ul>
	
	<p><a href="http://www.justjournal.com/" title="JustJournal.com">Free Blog</a></p>
   
 
 <script type="text/javascript">
   <!--
   // Set as Default Home Page Script
   // Copyright 2000 Lucas Holt
   // All Rights Reserved.
   
    var currentPage = "";
    var myURL = "http://www.foolishgames.com/";
    var ua = window.navigator.userAgent; 
   
   function msieversion()  {
       var msie = ua.indexOf ( "MSIE " );
       if ( msie > 0 )
           return parseInt ( ua.substring ( msie+5, ua.indexOf (
           ".", msie )))
       else
           return 0   // is other browser
    }
    
    window.IEVersion = msieversion();
    window.RunningIE5 = (window.IEVersion >= 5);
      
     if ( (ua.indexOf("Mac") < 1) && (window.RunningIE5)) {
          document.body.style.behavior='url(#default#homepage)';
          currentPage = document.body.isHomePage(myURL);
          	if (currentPage == false)  {
                document.write('<form name="pageME"><p class="verdanasm"><input type="checkbox" id="defaultpage" name="defaultpage" value="ON" onclick="myPage();">Make FoolishGames.com your default homepage.<\/p><\/form>');      
           }
     }
   
      function myPage() {

          if (document.pageME.defaultpage.checked) {   
              document.body.setHomePage(myURL);
          }
          return 0;
      }
   
   //-->
   </script>

</div>

<div id="footer">
 <hr />
 <p class="copy">Copyright &copy; 1997-2011 Lucas Holt, All rights reserved.
    <br />See <a href="../disclaimer.htm" title="Legal Information and Disclaimer">legal info</a> 
    and <a href="../privacy.htm" title="Privacy Policy">privacy policy</a>.
  </p>
</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-560995-4");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</body>
</html>
