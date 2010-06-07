<?php

/**
 * @author Matthew McNaney <mcnaney at gmail dot com>
 * @version $Id$
 */

if (!defined('PHPWS_SOURCE_DIR')) {
    include '../../core/conf/404.html';
    exit();
}

if ($_REQUEST['module'] != 'comments') {
    return;
}

Core\Core::initModClass('comments', 'Comments.php');

if (isset($_REQUEST['user_action'])) {
    $_POST['uop'] = $_GET['uop'] = $_REQUEST['uop'] = $_REQUEST['user_action'];
}

if (isset($_REQUEST['uop'])) {
    Comments::userAction($_REQUEST['uop']);
} elseif (isset($_REQUEST['aop']) && Current_User::authorized('comments')) {
    Comments::adminAction($_REQUEST['aop']);
} elseif (isset($_GET['tab']) && Current_User::authorized('comments')) {
    Comments::adminAction($_REQUEST['tab']);
} elseif (isset($_REQUEST['cm_id'])) {
    Comments::userAction('view_comment');
} else {
    Core\Core::errorPage('404');
}

?>