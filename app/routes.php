<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/api/acquirer/selling_targets', function (Group $group) {
        $group->get('/{id}', \App\Application\Actions\Acquirer\SellingTargets\GetIdAction::class);
    });

    $app->group('/api/seller/selling_targets', function (Group $group) {
        $group->get('/{id}', \App\Application\Actions\Seller\SellingTargets\GetIdAction::class);
    });
};
