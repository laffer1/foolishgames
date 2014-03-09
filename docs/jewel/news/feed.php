<?php 
header('Content-type: application/rss+xml');
mb_http_output("iso-8859-1");
echo '<?xml version="1.0" encoding="ISO-8859-1" ?>';
?>
<rss version="2.0">
	<channel>
		<title>Jewel News Feed</title>
     	<link>http://www.foolishgames.com/jewel/news/</link>
   		<description>Foolish Games Jewel News</description>
		<language>en-us</language>
		<webMaster>luke@foolishgames.com</webMaster>
		<managingEditor>luke@foolishgames.com</managingEditor>
		<copyright>Copyright 2007 Lucas Holt</copyright>
		<docs>http://blogs.law.harvard.edu/tech/rss</docs>
		<ttl>360</ttl>
<?php
include( '../../scripts/dbinfo.php' );
   
$currentPage = $_SERVER["PHP_SELF"];

$conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );

/* check connection */
if (!$conn) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql = 'SELECT id, date, title, content FROM articles ORDER BY date DESC, id DESC LIMIT 0,14';


$result = mysqli_query( $conn, $sql );

if ($myrow = mysqli_fetch_array($result, MYSQLI_BOTH)) {

  do {
  	$subject = $myrow["title"];
  	$body = $myrow["content"];
				
    echo "<item>";
    
	echo "<title>";
	echo $subject;
	echo "</title>";
    
	echo "<link>http://www.foolishgames.com/jewel/news/index#";
	echo $myrow["id"]; 
	echo "</link>";
	
    echo "<description>";
    echo $body;
	echo "</description>";
	echo "</item>";

  } while ($myrow = mysqli_fetch_array($result));
  
  echo "</channel>";
  echo "</rss>";

} else {

	echo "Sorry, no records were found!";	

}

mysqli_free_result($result);

/* close connection */
mysqli_close($conn);

?>
