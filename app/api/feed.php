<?php

require_once 'core/init.inc.php';
require_once 'core/db.inc.php';
require_once 'core/gzip.inc.php';

require_once 'model/NewsItem.inc.php';
require_once 'model/Total.inc.php';

header('Content-type: application/rss+xml');
mb_http_output("iso-8859-1");

echo '<?xml version="1.0" encoding="ISO-8859-1" ?>' . "\n";
?>
<rss version="2.0">
    <channel>
        <title>Jewel News Feed</title>
        <link>http://www.foolishgames.com/#/news</link>
        <description>Foolish Games Jewel News</description>
        <language>en-us</language>
        <webMaster>luke@foolishgames.com</webMaster>
        <managingEditor>luke@foolishgames.com</managingEditor>
        <copyright>Copyright 2007 Lucas Holt</copyright>
        <docs>http://blogs.law.harvard.edu/tech/rss</docs>
        <ttl>360</ttl>
        <?php
        $currentPage = $_SERVER["PHP_SELF"];

        try {
            $conn = $DB->connect();

            $sql = 'SELECT id, date, title, content FROM articles ORDER BY date DESC, id DESC LIMIT 14 OFFSET 0';

            $result = $DB->execQuery($sql);

            if ($myrow = $result->fetch()) {

                do {
                    $subject = $myrow["title"];
                    $body = $myrow["content"];

                    echo "<item>\n";

                    echo "\t<title>";
                    echo $subject;
                    echo "</title>\n";

                    echo "\t<link>http://www.foolishgames.com/#/news/";
                    echo $myrow["id"];
                    echo "</link>\n";

                    echo "\t<description>";
                    echo $body;
                    echo "</description>\n";
                    echo "</item>\n";

                } while ($myrow = $result->fetch());
            }
            $DB->disconnect();
        } catch (Exception $e) {

        }
        ?>
    </channel>
</rss>