<?php
header('Content-type: application/json');
mb_http_output("iso-8859-1");

include('../scripts/dbinfo.php');

class NewsItem
{
    public $id;
    public $date;
    public $title;
    public $content;
}

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql = "SELECT id, DATE_FORMAT(date, '%Y-%m-%dT%TZ') as date, title, content FROM articles ORDER BY date DESC, id DESC";

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
