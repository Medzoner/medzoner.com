<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

//umask(0000);

//load allowed ips
$ips = ['127.0.0.1', 'fe80::1', '::1', '172.61.0.9', '172.61.0.1'];

if (!in_array(@$_SERVER['HTTP_X_REAL_IP'], $ips)
    &&  !(in_array(@$_SERVER['REMOTE_ADDR'], $ips) || php_sapi_name() === 'cli-server')
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file: '.$_SERVER['REMOTE_ADDR'].'. Check '.basename(__FILE__).' for more information.');
}
/**
 * @var Composer\Autoload\ClassLoader $loader
 */
$loader = require __DIR__.'/../app/autoload.php';
Debug::enable();
$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);