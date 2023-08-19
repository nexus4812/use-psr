<?php

use Nyholm\Psr7\Factory\Psr17Factory as ServerRequestFactor;
use Psr\Http\Message\ServerRequestFactoryInterface;

require_once __DIR__ . '/../../vendor/autoload.php';

/** @var ServerRequestFactoryInterface $factory */
$factory = new ServerRequestFactor();

$request = $factory->createServerRequest('GET', $_SERVER['REQUEST_URI'], $_SERVER);

$response = (new \App\Middleware\Middleware())->process($request, new \App\Controller\Controller());

http_response_code($response->getStatusCode());
echo $response->getReasonPhrase();
