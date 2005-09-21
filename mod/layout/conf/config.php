<?php

// If you wish to allow insertion of php code in a theme (i.e. the inclusion of
// a theme's 'theme.php' file) then set the following define to TRUE.
// MAKE SURE to carefully inspect all of your current themes' theme.php files
// BEFORE changing this to TRUE.

$display_error_message = '
<div align="center"><img src="images/core/sorry.gif" /></div>
<b>We seem to be experiencing technical difficulties.
Back in a few.</b><br />';


define('DEFAULT_BOX_VAR', 'DEFAULT');
define('DEFAULT_THEME_VAR', 'BODY');
define('DEFAULT_LAYOUT_HOLD', 20);
define('DEFAULT_CONTENT_VAR', '_MAIN');
define('MAX_ORDER_VALUE', 99999);
define('PAGE_TITLE_DIVIDER', ' - ');


// If FALSE, module style sheets will not be loaded
define('LAYOUT_ALLOW_STYLE_LINKS', TRUE);

define('DISPLAY_ERROR_MESSAGE', $display_error_message);


if (!defined('ALLOW_THEME_PHP_INSERTION'))
     define('ALLOW_THEME_PHP_INSERTION', FALSE);

/********** Errors ****************/

define('LAYOUT_SESSION_NOT_SET',    -1);
define('LAYOUT_NO_CONTENT',         -2);
define('LAYOUT_NO_THEME',           -3);
define('LAYOUT_BAD_JS_DATA',        -4);
define('LAYOUT_JS_FILE_NOT_FOUND',  -5);
define('LAYOUT_BOX_ORDER_BROKEN',   -6);

?>