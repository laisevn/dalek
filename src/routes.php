<?php
/**Routes */

use function Main\Factories\makeSignUpController;
use Main\Adapter\SlimRouteAdapter;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../src/Main/Factories/SignUp.php';
require __DIR__ . '/../src/Infra/Db/MySQL/AccountRepository/Account.php';
require __DIR__ . '/../src/Presentation/Helpers/HttpHelper.php';
require __DIR__ . '/../src/Main/Adapter/SlimRouteAdapter.php';
require __DIR__ . '/../src/Presentation/Errors/MissignParamError.php';
require __DIR__ . '/../src/Presentation/Errors/InvalidParamError.php';
require __DIR__ . '/../src/Infra/Db/MySQL/Helper/MysqlConnection.php';

$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

/** Home */
$app->get('/', 'Presentation\Controllers\HomeController:getHelp');

/** Account */
$app->post('/signup', function (Request $request, Response $response, $args) {

    $slimAdapter = new SlimRouteAdapter(makeSignUpController());
    return $slimAdapter->adaptRoute($request, $response);
});
