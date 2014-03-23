<?php
  // $Id: init.inc.php,v 1.1 2009/02/11 21:22:57 laffer1 Exp $

//  Ensure thet '.' is the first part of the include path
$inc_path = explode(PATH_SEPARATOR, ini_get('include_path'));
if ($inc_path[0] != ".")
{
    array_unshift($inc_path, ".");
    $inc_path = implode(PATH_SEPARATOR, $inc_path);
    core_ini_set("include_path", $inc_path);
}
unset($inc_path);

function core_ini_set($var, $value)
{
    if (function_exists('ini_set'))
    {
        ini_set($var, $value);
    }
}

?>