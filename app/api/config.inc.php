<?php

// $Id: config.inc.php,v 1.17 2009/06/24 18:04:00 laffer1 Exp $

/*
 * Set the database connection parameters for SQL
 *
 * This is the only file you need to edit.
 */


interface DBConfig {
	const dbname = 'fg';
    const user = 'fgcom';
    const pass = '';
    const host = 'db.midnightbsd.org';
    const connection_pool = true;
}

interface EmailConfig {
	const default_from_address = 'webserver@foolishgames.com';
}

?>
