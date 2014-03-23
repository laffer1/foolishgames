<?php
// $Id: applog.inc.php,v 1.3 2009/02/16 19:52:57 laffer1 Exp $

final class AppLog {
    private $syslog_enable;
    private $debug_enable;
    private $info_enable;

    public function __construct($syslog = true, $debug = false, $info = false) {
        $this->syslog_enable = $syslog;
        $this->debug_enable = $debug;
        $this->info_enable = $info;
    }

    public function enableSyslog() {
        $this->syslog_enable = true;
    }

    public function disableSyslog() {
        $this->syslog_enable = false;
    }

    public function enableDebug() {
        $this->debug_enable = true;
    }

    public function disableDebug() {
        $this->debug_enable = false;
    }

    public function enableInfo() {
        $this->info_enable = true;
    }

    public function disableInfo() {
        $this->info_enable = false;
    }

    public function info($infomsg) {
        if ($this->info_enable)
            $this->syslogwrite('info: ' . $infomsg, LOG_INFO);
    }

    public function warning($warnmsg) {
        $this->syslogwrite('warning: ' . $warnmsg, LOG_WARNING);
    }

    public function error($errmsg) {
        $this->syslogwrite('err: ' . $errmsg, LOG_ERR);
    }

    public function debug($debugmsg) {
        if ($this->debug_enable)
        $this->syslogwrite('debug: ' . $debugmsg, LOG_DEBUG);
    }

    public function syslogwrite($msg, $type = LOG_WARNING) {
        if ($this->syslog_enable)
            syslog($type, $msg);
    }
}

$APPLOG = new AppLog;
?>