<?php
/**
 * @author Matthew McNaney <mcnaney at gmail dot com>
 * @version $Id$
 */

if (!defined('PHPWS_SOURCE_DIR')) {
    include '../../core/conf/404.html';
    exit();
}

if (isset($_REQUEST['user_cmd'])) {
    Core\Core::initModClass('profiler', 'Profiler.php');
    Profiler::user();
} else {
    if (!Current_User::authorized('profiler')) {
        Current_User::disallow();
    }

    Core\Core::initModClass('profiler', 'Profiler.php');
    Profiler::admin();
}

?>