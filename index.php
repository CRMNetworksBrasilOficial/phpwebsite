<?php

// REMOVE !

define("AUTO_ROUTE", TRUE);

if (is_file("config/core/config.php")) require_once "config/core/config.php";
else {
  if (AUTO_ROUTE == TRUE){
    header("location:http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "setup/");
    exit();
  } else
    exit("Fatal Error: Could not locate your configuration file.");
}

require_once PHPWS_SOURCE_DIR . "inc/Functions.php";

/* Show all errors */
error_reporting (E_ALL);

ob_start();

/* Security against those with register globals = on */
if (ini_get('register_globals')){
  foreach ($_REQUEST as $requestVarName=>$nullIT)
    unset($requestVarName);
  unset($nullIT);
}

/* Initialize core defines */
require_once PHPWS_SOURCE_DIR . "core/class/Init.php";

PHPWS_Core::checkSecurity();
PHPWS_Core::initializeModules();

session_name(SESSION_NAME);
session_start();

checkJavascript();

PHPWS_Core::runtimeModules();
PHPWS_Core::runCurrentModule();

PHPWS_Core::closeModules();
ob_end_flush();

PHPWS_DB::disconnect();

PHPWS_Core::setLastPost();

PHPWS_Core::report();

if (isset($_REQUEST['reset']))
     PHPWS_Core::killAllSessions();

     printf("%.2f mb", (memory_get_usage() / 1024) / 1024);
?>