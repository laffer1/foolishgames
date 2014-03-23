<?php
// $Id: db.inc.php,v 1.21 2009/04/20 01:41:22 laffer1 Exp $

require_once 'config.inc.php';
require_once 'core/applog.inc.php';

/**
 * Create and manage database connections, a wrapper for PDO.
 *
 * @author Lucas Holt
 * @see DBConfig
 */
final class DB implements DBConfig {
    private $conn = null;   // connection
    private $debug = false;

    /**
     * Sanitize input for SQL parameters.
     * @param string $value unsanitized value
     * @return mysql friendly string
     */
    public function sql_quote($value) {
        if( get_magic_quotes_gpc() ) {
            $value = stripslashes( $value );
        }

        //check if this function exists
        if( function_exists( "mysql_real_escape_string" ) ) {
            $value = mysql_real_escape_string( $value );
        } else {
            $value = addslashes( $value );
        }

        return $value;
    }


    /**
     * Enable the debugging mode to log details
     */
    public function enableDebug() {
    	$this->debug = true;
    }


    /**
     * Disable the debug mode to keep the log file small
     */
    public function disableDebug() {
    	$this->debug = false;
    }


    /**
     * Obtain the connection object
     *
     * @return pdo connection object
     */
    public function getConn() {
    	return $this->conn;
    }


    /**
     * Connect to the database server
     *
     * @return pdo connection object
     */
    public function connect() {
        Global $APPLOG;

    	$h = self::host;
    	$u = self::user;
    	$p = self::pass;
    	$d = self::dbname;

    	try {
            /* "pgsql:dbname=$dbname;host=$dbhost", "$dbuser", "$dbpass" */
    	    $this->conn = new PDO("pgsql:dbname=$d;host=$h", $u, $p, array(PDO::ATTR_PERSISTENT => self::connection_pool));
    	} catch(PDOException $e){
    		if ($this->debug == true)
    		{
                echo $e->getMessage();
                $APPLOG->debug($e->getMessage());
    		}
        }
    	return $this->conn;
    }


    /**
     * Disconnect from the database.
     * If connection pooling is enabled, the connection will return to the pool.
     */
    public function disconnect() {
    	$this->conn = null;
    }


    /**
     * Enable UTF8 on the connection.  Assumes existing connection.
     *
     * @return bool true on success
     */
    public function setUTF8() {
        Global $APPLOG;

    	try {
    	    $ret = execNonQuery('SET CHARACTER SET utf8');
    	} catch (Exception $e) {
    	    if ($this->debug == true)
    		{
                echo $e->getMessage();
                $APPLOG->debug($e->getMessage());
    		}
    	    return false;
    	}

    	return true;
    }


    /**
     * Perform a query on the database that will not return
     * a result set or scalar.
     *
     * @param string $sql
     * @return integer number of records affected
     */
    public function execNonQuery($sql) {
         if (isset($this->conn))
    	     $count = $this->conn->exec($sql);
    	 else
    	     throw new Exception("Connection not available");

    	 return $count;
    }


    /**
     * Perform a query on the database that will not return
     * a result set or scalar.
     *
     * Handles connection management for you.
     *
     * @param string $sql
     * @return integer number of records affected
     */
    public function execNonQuery2($sql) {
        $this->connect();
        $count = $this->execNonQuery($sql);
        $this->disconnect();
        return $count;
    }


    /**
     * Execute a series of SQL statements (from an array) wrapped in a
     * transaction.
     * @param array $arr
     * @return int -1 on error, rows affected total
     */
    public function execNonQueryTransaction($arr) {
        if (!is_array($arr))
            return -1;

        $count = 0;

        $this->connect();
        $this->conn->beginTransaction();

        try {
            foreach ($arr as $sql)
            {
                $ct = $this->conn->exec($sql);
                $count += $ct;
            }

            $this->conn->commit();
        } catch (PDOException $p) {
            $this->conn->rollBack();
            throw $p;
        }
        $this->disconnect();

        return $count;
    }


    /**
     * Perform a UTF8 query on the database that will not return
     * a result set or scalar.
     *
     * @param string $sql
     * @return integer number of records affected
     */
    public function execNonQueryUTF8($sql) {
    	if (!setUTF8())
    	    throw new Exception("Connection not available");
    	$count = execNonQuery($sql);
    	return $count;
    }


    /**
     * Perform a select query which returns one value back
     * (a scalar)
     *
     * @param string $sql an SQL select query
     * @return string scalar
     */
    public function execScalar($sql) {
    	if (!isset($this->conn))
    	    throw new Exception("Connection not available");

    	$q = $this->execQuery($sql);
    	return $q->fetchColumn(0);
    }


    /**
     * Perform a SELECT query with one or more rows returned
     *
     * @param string $sql SQL select query
     * @return pdo query statement
     */
    public function execQuery($sql) {
    	if (!isset($this->conn))
    	    throw new Exception("Connection not available");
    	$q = $this->conn->query($sql);
    	return $q;
    }


    /**
     * Perform a UTF8 SELECT query with one or more rows returned
     *
     * @param string $sql SQL select query
     * @return pdo query statement
     */
    public function execQueryUTF8($sql) {
    	if (!setUTF8())
    	    throw new Exception("Connection not available");
    	return execQuery($sql);
    }


    /**
     * Perform a SELECT query with one or more rows returned.
     * Uses a one time connection (no need to create one yourself)s
     *
     * @param string $sql SQL select query
     * @return array an associative array of the result set
     */
    public function execQueryWithArray($sql) {
	    $this->connect();
        $stmt = $this->execQuery($sql);
	    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect();

	    return $result;
    }
}

// Global instance
$DB = new DB();
?>