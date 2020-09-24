<?php
/**Routes */


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Main\Adapter\SlimRouteAdapter;
use function Main\Factories\makeSignUpController;

require __DIR__ . '/../src/Main/Factories/SignUp.php';
require __DIR__ . '/../src/Infra/Db/MySQL/AccountRepository/Account.php';
require __DIR__ . '/../src/Presentation/Helpers/HttpHelper.php';
require __DIR__ . '/../src/Main/Adapter/SlimRouteAdapter.php';
require __DIR__ . '/../src/Presentation/Errors/MissignParamError.php';
require __DIR__ . '/../src/Presentation/Errors/InvalidParamError.php';
require __DIR__ . '/../src/Infra/Db/MySQL/Helper/MysqlConnection.php';

  $app->addBodyParsingMiddleware();
  $app->addRoutingMiddleware();
  // $app->addErrorMiddleware(true, true, true);
  
/** Home */
$app->get('/', 'Presentation\Controllers\HomeController:getHelp');

/** Account */
$app->post('/signup', function(Request $request, Response $response, $args) {
  $controller = makeSignUpController();
  $httpRequest = json_encode(['body' => $request->getQueryParams()]);
  $httpResponse = $controller->handle($httpRequest);

  $response->getBody()->write(json_decode($httpResponse, true)['body']);
  return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(json_decode($httpResponse, true)['statusCode']);
});
