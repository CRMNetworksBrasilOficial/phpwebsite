<?php
/**
 *
 * @author Matthew McNaney <mcnaney at gmail dot com>
 * @version $Id$
 */

function controlpanel_register($module, &$content)
{
    Core\Core::initModClass('controlpanel', 'ControlPanel.php');

    $result = PHPWS_ControlPanel::registerModule($module, $content);
    return $result;
}

?>