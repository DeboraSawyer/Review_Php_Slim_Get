<?php

include_once __DIR__ . "/../vendor/autoload.php";

use App\SystemServices\MonologFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

MonologFactory::getLogger()->debug("main executando...");

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('Espaço vazio');
    return $response;
});

$app->get('/q', function (Request $request, Response $response) {
    $response->getBody()->write('A letra q representa a query!');
    return $response;
});

$app->get('/aluno', function (Request $request, Response $response) {
    $response->getBody()->write('Insira o RM.');
    return $response;
});

$app->run();

?>