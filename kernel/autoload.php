<?php
include_once realpath(__DIR__.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.'ClassLoader.class.php');
include_once realpath(__DIR__.DIRECTORY_SEPARATOR.'util'.DIRECTORY_SEPARATOR.'StringUtils.class.php');
$classLoader = new \cm\antonia\kernel\system\ClassLoader();
spl_autoload_register(array($classLoader,'loadClass'));
$exceptionHandler = new cm\antonia\kernel\exception\AntoniaException();
error_reporting(E_ALL);
set_error_handler(array($exceptionHandler,'errorHandler'));
set_exception_handler(array($exceptionHandler,'exceptionHandler'));
register_shutdown_function(array($exceptionHandler,'fatalErrorHandler'));
