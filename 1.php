<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
//引入自动加载文件
include './vendor/autoload.php';
//create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('./log/'.date('Ymd').'.log', Logger::WARNING));
// add records to the log
$log->warning('Foo');
$log->warning('这是一个警告啊');
$log->error('Bar');