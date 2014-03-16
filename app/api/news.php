<?php
function gzip_compression()
{

    //If no encoding was given - then it must not be able to accept gzip pages
    if (empty($_SERVER['HTTP_ACCEPT_ENCODING'])) {
        return false;
    }

    //If zlib is not ALREADY compressing the page - and ob_gzhandler is set
    if ((ini_get('zlib.output_compression') == 'On'
            OR ini_get('zlib.output_compression_level') > 0)
        OR ini_get('output_handler') == 'ob_gzhandler'
    ) {
        return false;
    }

    //Else if zlib is loaded start the compression.
    if (extension_loaded('zlib') AND (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE)) {
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

class Total
{
    public $count;
}

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if (isset($_GET['total'])) {
    $sql = "SELECT count(*) from articles;";
        $result = mysqli_query($conn, $sql);

        if ($myrow = mysqli_fetch_row($result)) {
            $item = new Total();
            $item->count = $myrow[0];

            echo json_encode($item);
        }

        mysqli_free_result($result);
}
else if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (is_numeric($id) && $id > 0) {
        $sql = "SELECT id, DATE_FORMAT(date, '%Y-%m-%dT%TZ') AS date, title, content FROM articles WHERE id='$id' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if ($myrow = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            $item = new NewsItem();
            $item->title = $myrow["title"];
            $item->content = $myrow["content"];
            $item->id = $myrow["id"];
            $item->date = $myrow["date"];

            echo json_encode($item);
        }

        mysqli_free_result($result);
    }
} else {
    $maxRows_rs1 = 10;
    $pageNum_rs1 = 0;
    if (isset($_GET['pg'])) {
        $pageNum_rs1 = $_GET['pg'];
    }
    $startRow_rs1 = $pageNum_rs1 * $maxRows_rs1;

    $query_rs1 = "SELECT id, DATE_FORMAT(date, '%Y-%m-%dT%TZ') AS date, title, content FROM articles ORDER BY date DESC, id DESC";
    $sql = sprintf("%s LIMIT %d, %d", $query_rs1, $startRow_rs1, $maxRows_rs1);

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

    echo json_encode($arr);
}

mysqli_close($conn);
