<?php
include( '../../scripts/dbinfo.php' );

$currentPage = $_SERVER["PHP_SELF"];

$fgdb = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$fgdb) {
	die('Not connected to database.');
}

$maxRows_rs1 = 10;
$pageNum_rs1 = 0;
if (isset($_GET['pageNum_rs1'])) {
  $pageNum_rs1 = $_GET['pageNum_rs1'];
}
$startRow_rs1 = $pageNum_rs1 * $maxRows_rs1;

mysql_select_db($dbname, $fgdb);
$query_rs1 = "SELECT id, date, title, content FROM articles ORDER BY date DESC, id DESC";
$query_limit_rs1 = sprintf("%s LIMIT %d, %d", $query_rs1, $startRow_rs1, $maxRows_rs1);
$rs1 = mysql_query($query_limit_rs1, $fgdb) or die(mysql_error());
$row_rs1 = mysql_fetch_assoc($rs1);

if (isset($_GET['totalRows_rs1'])) {
  $totalRows_rs1 = $_GET['totalRows_rs1'];
} else {
  $all_rs1 = mysql_query($query_rs1);
  $totalRows_rs1 = mysql_num_rows($all_rs1);
}
$totalPages_rs1 = ceil($totalRows_rs1/$maxRows_rs1)-1;

$queryString_rs1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rs1") == false && 
        stristr($param, "totalRows_rs1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rs1 = "&" . implode("&", $newParams);
  }
}
$queryString_rs1 = sprintf("&totalRows_rs1=%d%s", $totalRows_rs1, $queryString_rs1);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<!-- #BeginTemplate "/Templates/core.dwt" --><!-- DW6 -->  

  <head>
    <!-- Code by Luke@foolishgames.com NOT for USE without permision //--> 
    <!-- #BeginEditable "doctitle" -->
    <title>News - Jewel Kilcher- Foolish Games</title>
	<link rel="alternate" type="application/rss+xml" href="feed.php" title="Foolish Games Jewel News RSS" />
    <!-- #EndEditable --> 
    <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-1" />
    <link rev="made" href="mailto:luke@foolishgames.com" />
    <link rel="stylesheet" type="text/css" media="print" href="/print.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/fg.css" />
  </head>

  <body lang="EN">

<!-- Web Design by Lucas Holt //-->

<!-- #BeginEditable "ads" -->

<!-- #EndEditable -->

<!-- Begin Header //-->
	<table width="500" border="0" cellpadding="0" cellspacing="0">
  		<tr> 
    		<td colspan="2" rowspan="2"><img src="/images/minijewel.png" alt="Jewel" width="133" height="136" /> 
    		</td>
    		<td> <img src="/images/newfg_02.jpg" width="371" height="112" usemap="#Map2" border="0" alt="Navigation: FoolishGames.com" />
				<map name="Map2" id="Map2"> 
        			<area shape="rect" coords="10,6,57,23" href="/jewel/index" alt="Home" />
  					<area shape="rect" coords="75,5,136,21" href="/sitemap/index" alt="Site Map" />
  					<area shape="rect" coords="154,5,195,22" href="/email/index" alt="E-mail" />
  					<area shape="rect" coords="220,3,286,23" href="/jewel/lyrics/index" alt="The Music" />
  					<area shape="rect" coords="296,5,356,22" href="/jewel/bio/index" alt="The Story" />
				</map>
			</td>
  		</tr>
  		<tr> 
    		<td>&nbsp; </td>
  		</tr>
	</table>
<!-- End Header //-->

 <div id="content">
  <!-- #BeginEditable "content" -->
 <h2>News</h2>
  <p> Related Content: <a href="tour/2002.html" title="Tour Dates for 2002">TourDates 
    (2002)</a>, <a href="tour/1999.html" title="Tour Dates for 1999">Tour Dates 
    (1999)</a>, <a href="chart.html">Chart Positions</a>, <a href="review_sessions.html">Sessions @ AOL Review</a></p>
	
  <p><span class="brdthinsilver">Total: <?php echo $totalRows_rs1 ?> </span> <span class="brdthinsilver">Page: <?php echo $pageNum_rs1 ?></span> &nbsp; 
  </p>
  
  <p><img src="../../images/feed.gif" alt="RSS News Feed" /> <a href="feed.php">Subscribe</a></p>

<p><a href="<?php printf("%s?pageNum_rs1=%d%s", $currentPage, 0, $queryString_rs1); ?>">First</a> 
  <a href="<?php printf("%s?pageNum_rs1=%d%s", $currentPage, max(0, $pageNum_rs1 - 1), $queryString_rs1); ?>">&lt; Back</a> 
  <a href="<?php printf("%s?pageNum_rs1=%d%s", $currentPage, min($totalPages_rs1, $pageNum_rs1 + 1), $queryString_rs1); ?>">Next &gt;</a> 
  <a href="<?php printf("%s?pageNum_rs1=%d%s", $currentPage, $totalPages_rs1, $queryString_rs1); ?>">Last</a> 
</p>

<?php do { ?>
	<p><span class="silver"><?php echo $row_rs1['date']; ?></span> 
	&nbsp;<strong><a name="<?php echo $row_rs1['id']; ?>"><?php echo $row_rs1['title']; ?></a></strong>: <br />
	<br />
	<?php echo str_replace("\n","<br />",$row_rs1['content']); ?></p> 
<?php } while ($row_rs1 = mysql_fetch_assoc($rs1)); ?>

<!-- #EndEditable -->

     
  <p> <a href="/jewel/lyrics/index" title="Lyrics">lyrics</a> | <a href="/jewel/poetry/index" title="Poetry">poetry</a> 
    | <a href="/jewel/bio/index" title="Biography">biography</a> | <a href="/download/index" title="Downloads">downloads</a> 
    | <a href="/jewel/disc/index" title="Discography">discography</a> | <a href="/jewel/links/index" title="Links">links</a> 
    | <a href="/jewel/misc/index" title="Miscellaneous">miscellaneous</a> 
    <br />
    <a href="/jewel/pics/index" title="Pictures">pictures</a> | <a href="/jewel/news/index" title="Jewel News">news</a> 
    | <a href="/email/index" title="E-mail the Webmaster">e-mail</a> | <a href="/jewel/guest/index" title="Guest Book">guest 
    book</a> | <a href="/ml/index" title="Mailing List">mailing list</a> | <a href="/cgi-bin/bb/bb" title="Message Board">message board</a></p>

  </div>

<!-- Begin Footer //-->
	<p class="copy">
		<img src="/images/newfg_05.png" width="497" height="108" usemap="#Map" border="0" alt="Copyright 1996-2003 Lucas Holt.  All Rights Reserved." /> 
  		<map name="Map" id="Map"> 
    		<area shape="rect" coords="262,12,347,29" href="/privacy" alt="Privacy Policy" />
    		<area shape="rect" coords="360,11,417,28" href="/disclaimer" alt="Legal Information" />
    		<area shape="rect" coords="90,56,153,71" href="/email/index" alt="E-mail Address" />
  		</map>
	</p>
<!-- End Footer //-->
	
  <!-- Code Copyright 1996-2003 Lucas Holt //-->
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

<!-- #EndTemplate --></html>
<?php
mysql_free_result($rs1);
mysql_close($fgdb);
?>

