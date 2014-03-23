<?php

require_once 'core/init.inc.php';
require_once 'core/db.inc.php';
require_once 'core/gzip.inc.php';

require_once 'model/NewsItem.inc.php';
require_once 'model/Total.inc.php';

header('Content-type: application/json');
mb_http_output("iso-8859-1");

function getTotal()
{
    Global $DB;
    $item = new Total();
    $DB->connect();
    $sql = "SELECT count(id) FROM articles;";
    $item->count = $DB->execScalar($sql);
    $DB->disconnect();
    return $item;
}

if (isset($_GET['total'])) {
    echo json_encode(getTotal());
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (is_numeric($id) && $id > 0) {
        $sql = "SELECT id, date, title, content FROM articles WHERE id='$id'";

        $DB->connect();
        $stmt = $DB->execQuery($sql);
        if ($myrow = $stmt->fetch()) {
            $datetime = new DateTime($myrow["date"]);
                   $myrow["date"] = $datetime->format(DateTime::ISO8601);
            echo json_encode($myrow);
        }
        $DB->disconnect();
    }
} else {
    $maxRows_rs1 = 10;
    $pageNum_rs1 = 0;
    if (isset($_GET['pg'])) {
        $pageNum_rs1 = $_GET['pg'];
    }
    $startRow_rs1 = $pageNum_rs1 * $maxRows_rs1;

    $query_rs1 = "SELECT id, date, title, content FROM articles ORDER BY date DESC, id DESC";
    $sql = sprintf("%s limit %d offset %d", $query_rs1, $maxRows_rs1, $startRow_rs1);
    $arr = array();

    try {
        $DB->connect();

        $stmt = $DB->execQuery($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $DB->disconnect();

        foreach ($result as $myrow) {
            $item = new NewsItem();
            $item->title = $myrow["title"];
            $item->content = $myrow["content"];
            $item->id = $myrow["id"];

            $datetime = new DateTime($myrow["date"]);
            $item->date = $datetime->format(DateTime::ISO8601);

            array_push($arr, $item);
        }
    } catch (PDOException $e) {
        $APPLOG->error("news.php: " . $e->getMessage());
    }

    echo json_encode($arr);
}
