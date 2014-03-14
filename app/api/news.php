<?php
function gzip_compression() {

    //If no encoding was given - then it must not be able to accept gzip pages
    if( empty($_SERVER['HTTP_ACCEPT_ENCODING']) ) { return false; }

    //If zlib is not ALREADY compressing the page - and ob_gzhandler is set
    if (( ini_get('zlib.output_compression') == 'On'
    	OR ini_get('zlib.output_compression_level') > 0 )
    	OR ini_get('output_handler') == 'ob_gzhandler' ) {
    	return false;
    }

    //Else if zlib is loaded start the compression.
    if ( extension_loaded( 'zlib' ) AND (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE) ) {
    	ob_start('ob_gzhandler');
    }

    return true;
}

gzip_compression();

header('Content-type: application/json');
mb_http_output("iso-8859-1");

include('dbinfo.php');

class NewsItem
{
    public $id;
    public $date;
    public $title;
    public $content;
}

$maxRows_rs1 = 10;
$pageNum_rs1 = 0;
if (isset($_GET['pg'])) {
  $pageNum_rs1 = $_GET['pg'];
}
$startRow_rs1 = $pageNum_rs1 * $maxRows_rs1;

$query_rs1 = "SELECT id, DATE_FORMAT(date, '%Y-%m-%dT%TZ') as date, title, content FROM articles ORDER BY date DESC, id DESC";
$sql = sprintf("%s LIMIT %d, %d", $query_rs1, $startRow_rs1, $maxRows_rs1);

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$arr = array();
$result = mysqli_query($conn, $sql);

if ($myrow = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    do {
        $item = new NewsItem();
        $item->title = $myrow["title"];
        $item->content = $myrow["content"];
        $item->id = $myrow["id"];
        $item->date = $myrow["date"];

        array_push($arr, $item);
    } while ($myrow = mysqli_fetch_array($result));
}

mysqli_free_result($result);
mysqli_close($conn);

echo json_encode($arr);
?>
